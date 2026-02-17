<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $periodos = [
            'dia' => [now()->startOfDay(), now()->endOfDay()],
            'semana' => [now()->startOfWeek(), now()->endOfWeek()],
            'mes' => [now()->startOfMonth(), now()->endOfMonth()],
            'anio' => [now()->startOfYear(), now()->endOfYear()],
            'historico' => [null, null],
        ];

        $clasesPasadas = $inscripciones = $pagosRealizados = $licencias = $matriculacionesComputacion = $dineroSecretaria = $estudiantesFaltantes = [];

        foreach ($periodos as $key => [$inicio, $fin]) {
            // Clases pasadas
            $clasesPasadas[$key] = $key === 'historico'
                ? \App\Models\Clase::where('fecha', '<', now())->count()
                : \App\Models\Clase::whereBetween('fecha', [$inicio, $fin])->where('fecha', '<', now())->count();

            // Inscripciones vigentes
            $inscripciones[$key] = $key === 'historico'
                ? \App\Models\Inscripcione::where('vigente', 1)->count()
                : \App\Models\Inscripcione::where('vigente', 1)->whereBetween('created_at', [$inicio, $fin])->count();

            // Pagos realizados
            $pagosRealizados[$key] = $key === 'historico'
                ? \App\Models\Pago::count()
                : \App\Models\Pago::whereBetween('created_at', [$inicio, $fin])->count();

            // Licencias
            $licencias[$key] = $key === 'historico'
                ? \App\Models\Licencia::count()
                : \App\Models\Licencia::whereBetween('created_at', [$inicio, $fin])->count();

            // Matriculaciones computación
            $matriculacionesComputacion[$key] = $key === 'historico'
                ? \App\Models\Computacion::count()
                : \App\Models\Computacion::whereBetween('created_at', [$inicio, $fin])->count();

            // Dinero ingresado
            $dineroSecretaria[$key] = $key === 'historico'
                ? \App\Models\Pago::sum('monto')
                : \App\Models\Pago::whereBetween('created_at', [$inicio, $fin])->sum('monto');

            // Estudiantes faltantes (solo histórico tiene sentido, los demás igualan a histórico)
            if ($key === 'historico') {
                $totalEstudiantes = \App\Models\Estudiante::count();
                $estudiantesConInscripcion = \App\Models\Inscripcione::where('vigente', 1)->distinct('estudiante_id')->count('estudiante_id');
                $estudiantesFaltantes[$key] = $totalEstudiantes - $estudiantesConInscripcion;
            } else {
                $estudiantesFaltantes[$key] = $estudiantesFaltantes['historico'] ?? 0;
            }
        }

        // Docentes habilitados (estado_id = 1)
        $docentesHabilitados = \App\Models\Docente::where('estado_id', 1)->count();

        // Ranking de docentes por alumnos únicos atendidos (histórico)
        $rankingDocentes = \App\Models\Docente::where('estado_id', 1)->get()->map(function($docente) {
            $estudiantes = \App\Models\Estudiante::whereHas('inscripciones.programaciones.clases', function($q) use ($docente) {
                $q->where('docente_id', $docente->id);
            })->distinct('id')->count('id');
            $docente->alumnos_atendidos = $estudiantes;
            return $docente;
        })->sortByDesc('alumnos_atendidos')->take(5);

        // Ranking de docentes de computación por alumnos únicos atendidos (histórico)
        $rankingDocentesComputacion = \App\Models\Docente::where('estado_id', 1)->get()->map(function($docente) {
            $alumnos = \App\Models\Computacion::whereHas('matriculaciones.programacionescom.clasecoms', function($q) use ($docente) {
                $q->where('docente_id', $docente->id);
            })->distinct('persona_id')->count('persona_id');
            $docente->alumnos_computacion = $alumnos;
            return $docente;
        })->sortByDesc('alumnos_computacion')->take(5);

        // --- MÉTRICAS POR USUARIO ADMINISTRATIVO ---
        $usuariosAdministrativos = \App\Models\User::role(['Admin', 'Secretaria'])->get();
        $metricasAdministrativos = [];
        foreach ($usuariosAdministrativos as $usuario) {
            foreach ($periodos as $key => [$inicio, $fin]) {
                // Inscripciones gestionadas por usuario
                $inscripciones = $key === 'historico'
                    ? $usuario->inscripciones()->count()
                    : $usuario->inscripciones()->whereBetween('inscripciones.created_at', [$inicio, $fin])->count();

                // Matriculaciones gestionadas por usuario
                $matriculaciones = $key === 'historico'
                    ? $usuario->matriculaciones()->count()
                    : $usuario->matriculaciones()->whereBetween('matriculacions.created_at', [$inicio, $fin])->count();

                // Licencias gestionadas por usuario
                $licencias = $key === 'historico'
                    ? $usuario->licencias()->count()
                    : $usuario->licencias()->whereBetween('licencias.created_at', [$inicio, $fin])->count();

                // Clases gestionadas por usuario
                $clases = $key === 'historico'
                    ? $usuario->clases()->count()
                    : $usuario->clases()->whereBetween('clases.created_at', [$inicio, $fin])->count();

                // Clasescom gestionadas por usuario
                $clasescom = $key === 'historico'
                    ? $usuario->clasecoms()->count()
                    : $usuario->clasecoms()->whereBetween('clasecoms.created_at', [$inicio, $fin])->count();

                // Pagos gestionados por usuario
                $pagos = $key === 'historico'
                    ? $usuario->pagos()->count()
                    : $usuario->pagos()->whereBetween('pagos.created_at', [$inicio, $fin])->count();

                // Dinero recaudado por usuario
                $dinero = $key === 'historico'
                    ? $usuario->pagos()->sum('monto')
                    : $usuario->pagos()->whereBetween('pagos.created_at', [$inicio, $fin])->sum('monto');

                $metricasAdministrativos[$usuario->id][$key] = [
                    'usuario' => $usuario,
                    'inscripciones' => $inscripciones,
                    'matriculaciones' => $matriculaciones,
                    'licencias' => $licencias,
                    'clases' => $clases,
                    'clasescom' => $clasescom,
                    'pagos' => $pagos,
                    'dinero' => $dinero,
                ];
            }
        }

        return view('dashboard', compact(
            'clasesPasadas',
            'estudiantesFaltantes',
            'pagosRealizados',
            'licencias',
            'inscripciones',
            'matriculacionesComputacion',
            'dineroSecretaria',
            'docentesHabilitados',
            'rankingDocentes',
            'rankingDocentesComputacion',
            'metricasAdministrativos',
            'usuariosAdministrativos'
        ));
    }
}
