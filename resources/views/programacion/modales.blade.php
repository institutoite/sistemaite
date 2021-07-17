{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%% M O D A L   P A R A  M O S T R A R   U N A   P R O G R A M A C I O M  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%--}}

<div class="modal" tabindex="-1" id="modal-mostrar">
    <div class="modal-dialog modal-lg modalito">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                MOSTRAR PROGRAMACION
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-editar-pago">
                <div class="container p-4">
                    <table id="cambio" class="table table-bordered table-hover table-striped">
                        <thead class="bg-primary">
                            <tr>
                                <th>ATRIBUTO</th>
                                <th>VALOR</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-mostrar">
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">cerrar &times;</button>
            </div>
        </div>
    </div>
</div>


{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%% M O D A L   P A R A  M O S T R A R   U N A   P R O G R A M A C I O CON SUS CLASES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%--}}

<div class="modal" tabindex="-1" id="modal-mostrar-clase">
    <div class="modal-dialog modal-lg modalito">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                DETALLE DE LA CLASE
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-editar-pago">
                <div class="container p-4">
                    <table id="cambio" class="table table-bordered table-hover table-striped">
                        <thead class="bg-primary">
                            <tr>
                                <th>ATRIBUTO</th>
                                <th>VALOR</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-mostrar-clase">
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">cerrar &times;</button>
            </div>
        </div>
    </div>
</div>
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% M O D A L   P A R A   E D I T A R %$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="modal-editar">
    <div class="modal-dialog modal-lg modalito">
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
                    {{-- {{dd($programacion->habilitado)}} --}}
                    <div class="card-body">
                        {{-- <form method="POST" action="{{ route('programacions.update', $programacion->id) }}"  role="form" enctype="multipart/form-data"> --}}
                        <form id="formulario-editar" method="POST" action="{{route('programacion.actualizar')}}">
                            @csrf
                            {{-- @include('programacion.form') --}}
                            @include('include.botones')
                        </form>
                    </div>
                </div> 
            </div>
           
        </div>
    </div>
</div>
