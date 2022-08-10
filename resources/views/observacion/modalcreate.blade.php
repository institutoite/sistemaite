{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% M O D A L   P A R A   E D I T A R %$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="modal-editar">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                EDITAR PROGRAMACION
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header bg-primary">
                        <span class="card-title">Actualizar Programacion</span>
                    </div>
                    <div class="card-body">
                        {{-- <form method="POST" action="{{ route('programacions.update', $programacion->id) }}"  role="form" enctype="multipart/form-data"> --}}
                        <form id="formulario-editar" method="POST" action="{{route('programacion.actualizar')}}">
                            @csrf
                        
                            @include('include.botones')
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>


{{-- %%%%%%%%%%%%%%  MODALES CREAR Y EDITAR PERSONA DE ESTUDIANTES.BLADE.PHP %%%%%%%%%% --}}
    <x-createobservation 
        idmodalformulario="modal-agregar-observacion"
        id="editorpersona"
        nombre="editorpersona"
        observabletype="Persona"
        btnguardar="guardar-observacion"
        btnlabel="Guardar"
        titulo="CREAR UNA OBSERVACION DE PERSONA"
        modo="CREAR NUEVA OBSRVACION"
    >
    </x-createobservation>

    <x-createobservation 
        idmodalformulario="modal-editar-observacion"
        id="editorpersonaeditar"
        nombre="editar-observacion"
        observabletype="Persona"
        btnguardar="actualizar-observacion"
        btnlabel="Actualizar"
        titulo="EDITAR OBSERVACION DE PERSONA"
        modo="EDITAR OBSRVACION"
    >
    </x-createobservation>

{{-- %%%%%%%%%%%%%%  MODALES MOSTRAR OBSERVACIONES O CRUD COMPLETO  DE ESTUDIANTES.BLADE.PHP %%%%%%%%%% --}}
<x-crudobservacion 
    titulo="OBSERVACIONES DEL REGISTRO SELECCIONADO"
    header="Observaciones"
    idmodal="modal-mostrar-observaciones"
    >
</x-crudobservacion>
{{-- <x-crudobservacion 
    titulo="OBSERVACIONES DE INSCRIPCION"
    header="Observaciones"
    idmodal="modal-mostrar-observaciones-inscripcion"
    >
</x-crudobservacion> --}}

{{-- %%%%%%%%%%%%%%  MODALES MOSTRAR OBSERVACIONES O CRUD COMPLETO  DE ESTUDIANTES.BLADE.PHP %%%%%%%%%% --}}
