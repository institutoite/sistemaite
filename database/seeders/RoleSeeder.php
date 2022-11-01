<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    public function run()
    {
        $admin= Role::create(['name' => 'Admin']);
        $secre = Role::create(['name' => 'Secretaria']);
        $teacher = Role::create(['name' => 'Docente']);
        $student= Role::create(['name' => 'Estudiante']);
        
        Permission::create(['name' => 'Contactar Administrativos'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Listar Administrativos'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Crear Administrativos'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Editar Administrativos'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Eliminar Administrativos'])->syncRoles([$admin, $secre]);
        
        Permission::create(['name' => 'Listar Asignaturas'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Asignaturas'])->assignRole($admin);
        Permission::create(['name' => 'Editar Asignaturas'])->assignRole($admin);
        Permission::create(['name' => 'Eliminar Asignaturas'])->assignRole($admin);

        Permission::create(['name' => 'Listar Aulas'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Crear Aulas'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Editar Aulas'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Eliminar Aulas'])->syncRoles([$admin, $secre]);
        
        
        Permission::create(['name' => 'Listar Billetecom'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Crear Billetecom'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Graficar Billetecom'])->syncRoles([$admin]);
        
        Permission::create(['name' => 'Listar Billete'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Billete'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Billete'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Graficar Billete'])->syncRoles([$admin]);
        Permission::create(['name' => 'Eliminar Billete'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Editar Calificacion'])->syncRoles([$admin]);

        Permission::create(['name' => 'Graficar Informes'])->syncRoles([$admin]);
        Permission::create(['name' => 'Administrar Cartera'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Caracteristica'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Caracteristica'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Caracteristica'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Caracteristica'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Cargos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Cargos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Cargos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Cargos'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Carreras'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Carreras'])->syncRoles([$admin]);
        Permission::create(['name' => 'Editar Carreras'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Carreras'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Ciudades'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Ciudades'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Ciudades'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Ciudades'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Clasescom'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Clasescom'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Clasescom'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Clases'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Clases'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Clases'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Clases'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Colegios'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Colegios'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Colegios'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Colegios'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Comentarios'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Comentarios'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Comentarios'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Comentarios'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Comos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Comos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Comos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Comos'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Computacion'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Computacion'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Computacion'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Constantes'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Constantes'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Constantes'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Constantes'])->syncRoles([$admin,$secre]);
         
        Permission::create(['name' => 'Listar Contactoparaderivar'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Contactoparaderivar'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Crear Convenios'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Convenios'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Convenios'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Crear Cursos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Cursos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Cursos'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Departamentos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Departamentos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Departamentos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Departamentos'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Docentes'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Docentes'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Docentes'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Docentes'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Consultas Docentes'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Estados'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Estados'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Estados'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Estados'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Estudiantes'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Estudiantes'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Estudiantes'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Estudiantes'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Eventos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Eventos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Eventos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Eventos'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Feriados'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Feriados'])->syncRoles([$admin]);
        Permission::create(['name' => 'Editar Feriados'])->syncRoles([$admin]);
        Permission::create(['name' => 'Eliminar Feriados'])->syncRoles([$admin]);

        Permission::create(['name' => 'Listar Archivos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Archivos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Archivos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Archivos'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Grados'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Grados'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Grados'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Grados'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Editar Homes'])->syncRoles([$admin]);
        Permission::create(['name' => 'Eliminar Homes'])->syncRoles([$admin]);

        Permission::create(['name' => 'Crear Preguntas'])->syncRoles([$admin]);
        Permission::create(['name' => 'Editar Preguntas'])->syncRoles([$admin]);
        Permission::create(['name' => 'Eliminar Preguntas'])->syncRoles([$admin]);

        Permission::create(['name' => 'Crear Horarios'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Horarios'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Horarios'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Inscripciones'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Inscripciones'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Inscripciones'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Inscripciones'])->syncRoles([$admin]);

        Permission::create(['name' => 'Listar Intereses'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Intereses'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Intereses'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Intereses'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Licencias'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Licencias'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Licencias'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Licencias'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Materias'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Materias'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Materias'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Materias'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Matriculaciones'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Matriculaciones'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Matriculaciones'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Matriculaciones'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Crear Mensajeables'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Mensajeables'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Mensajeados'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Mensajeados'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Mensajes'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Mensajes'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Mensajes'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Mensajes'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Modalidades'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Modalidades'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Modalidades'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Modalidades'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Mododocentes'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Mododocentes'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Mododocentes'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Mododocentes'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Motivos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Motivos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Motivos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Motivos'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Municipios'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Municipios'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Municipios'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Municipios'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Crear Niveles'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Niveles'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Niveles'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Observaciones'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Observaciones'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Observaciones'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Observaciones'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Opciones Index'])->syncRoles([$admin]);
        Permission::create(['name' => 'Opciones Docentes'])->syncRoles([$admin]);
        Permission::create(['name' => 'Opciones Computacion'])->syncRoles([$admin]);
        Permission::create(['name' => 'Opciones Administrativos'])->syncRoles([$admin]);

        Permission::create(['name' => 'Listar Pagoscomputacion'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Pagoscomputacion'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Pagoscomputacion'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Pagos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Pagos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Pagos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Pagos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Graficar Pagos'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Paises'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Paises'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Paises'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Paises'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Periodos'])->syncRoles([$admin]);
        Permission::create(['name' => 'Crear Periodos'])->syncRoles([$admin]);
        Permission::create(['name' => 'Editar Periodos'])->syncRoles([$admin]);
        Permission::create(['name' => 'Eliminar Periodos'])->syncRoles([$admin]);
        
        Permission::create(['name' => 'Listar Dias'])->syncRoles([$admin]);
        Permission::create(['name' => 'Crear Dias'])->syncRoles([$admin]);
        Permission::create(['name' => 'Editar Dias'])->syncRoles([$admin]);
        Permission::create(['name' => 'Eliminar Dias'])->syncRoles([$admin]);
        
        Permission::create(['name' => 'Listar Permisos'])->syncRoles([$admin]);
        Permission::create(['name' => 'Crear Permisos'])->syncRoles([$admin]);
        Permission::create(['name' => 'Editar Permisos'])->syncRoles([$admin]);
        Permission::create(['name' => 'Eliminar Permisos'])->syncRoles([$admin]);

        Permission::create(['name' => 'Listar Personas'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Personas'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Personas'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Reportepersona'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Crear Planes'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Planes'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Planes'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Potenciales'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Potenciales'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Potenciales'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Potenciales'])->syncRoles([$admin]);

        Permission::create(['name' => 'Listar Programacioncom'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Programacioncom'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Programacioncom'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Programaciones'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Programaciones'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Programaciones'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Programaciones'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Provincias'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Provincias'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Provincias'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Provincias'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'Crear Roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'Editar Roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'Eliminar Roles'])->syncRoles([$admin]);

        Permission::create(['name' => 'Listar RolUserControl'])->syncRoles([$admin]);
        Permission::create(['name' => 'Editar RolUserControl'])->syncRoles([$admin]);

        Permission::create(['name' => 'Listar Telefonos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Telefonos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Telefonos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Telefonos'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Temas'])->syncRoles([$admin,$secre,$teacher]);
        Permission::create(['name' => 'Crear Temas'])->syncRoles([$admin,$secre,$teacher]);
        Permission::create(['name' => 'Editar Temas'])->syncRoles([$admin,$secre,$teacher]);
        Permission::create(['name' => 'Eliminar Temas'])->syncRoles([$admin,$secre,$teacher]);

        Permission::create(['name' => 'Listar Tipoarchivos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Tipoarchivos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Tipoarchivos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Tipoarchivos'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Tipomotivos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Tipomotivos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Tipomotivos'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Tipomotivos'])->syncRoles([$admin,$secre]);

        Permission::create(['name' => 'Listar Usuarios'])->syncRoles([$admin]);
        Permission::create(['name' => 'Crear Usuarios'])->syncRoles([$admin]);
        Permission::create(['name' => 'Editar Usuarios'])->syncRoles([$admin]);
        Permission::create(['name' => 'Eliminar Usuarios'])->syncRoles([$admin]);

        Permission::create(['name' => 'Listar Zonas'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Crear Zonas'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Editar Zonas'])->syncRoles([$admin,$secre]);
        Permission::create(['name' => 'Eliminar Zonas'])->syncRoles([$admin,$secre]);

        $admin = User::find(1); 
        $lidia = User::find(2); 
        $susana = User::find(3); 
        $elsa = User::find(4); 
        $admin->assignRole('Admin');
        $lidia->assignRole('Admin');
        $susana->assignRole('Secretaria');
        $elsa->assignRole('Secretaria');
    }
}
