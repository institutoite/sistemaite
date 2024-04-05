@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Crear Potencial')

@section('plugins.Jquery', true)
@section('plugins.Datatables', true)
@section('content')
    
        <div class="card">
            <div class="card-header bg-secondary">
                CREAR USUARIO SUPER RAPIDO <h3 class="text-white float-right" id="tokenExpirationform"></h3>
                {{-- {{dd($persona);}} --}}
            </div>
            <div class="card-body">
                <form action="{{route('personas.update.rapidingo',$persona)}}" id="formulario" method="post" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                    @csrf
                    @include('persona.rapidingo.formrapido')
                    @include('include.botones')
                </form>
            </div>
        </div>
        @if($tiempoToken==0)
            @include('include.modalGContact')
        @endif
@stop

@section('js')
<script type="text/javascript" src="{{ asset('dist/js/jquery.leanModal.min.js')}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="{{asset('assets/js/tiempoGcontact.js')}}"></script>
    
    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%% CKEDITOR --}}
    <script>
        // ClassicEditor
        //     .create( document.querySelector('#observacion'))
        //     .catch( error => {
        //         console.error(error);
        //     } );
        CKEDITOR.replace('observacion', {
            height: 120,
            width: "100%",
            removeButtons: 'PasteFromWord'
        });
    </script>
    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%% FIN CKEDITOR --}}
    <script>
        $(document).ready(function() {
            var intervalId;
            $('#modalGcontact').modal('show');
            function actualizarTokenExpiration() {
                $.ajax({
                    url: "{{ route('token-expiration') }}",
                    type: "GET",
                    success: function(response) {

                        console.log(response);
                        $('#tokenExpiration').text('Tiempo Restante: ' + response);
                        $('#tokenExpirationform').text('Tiempo Restante: ' + response);
                        $('#signIn').show();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
            intervalId = setInterval(actualizarTokenExpiration, 1000);
        });
    </script>

    <script>
        $(document).ready(function(){
             $('#personas').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,
                    "ajax": "{{ url('api/referencias') }}",
                    "columns": [
                        {data: 'id'},
                        {data: 'nombre'},
                        {data: 'apellidop'},
                        {data: 'apellidom'},
                        {
                            "name": "foto",
                            "data": "foto",
                            "render": function (data, type, full, meta) {
                                return "<img class='materialboxed' src=\"{{URL::to('/')}}/storage/" + data + "\" height=\"50\"/>";
                            },
                            "title": "Image",
                            "orderable": true,
            
                        }, 
                        {
                            data: 'btn'
                        },  
                    ],
                    "language":{
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                    },  
                });
                $('table').on('click','#ok',selecciona);
                function selecciona() {
                    console.log("clickeaste");
                    $("#persona_id").val($(this).closest('tr').children(0).html());
                    $("#persona_id").addClass('bg-primary');
                    $('#modal-ite').modal('toggle');
                    $('#modal-ite .close').remove();
                }
            });
        function  mostrarModal(){
            var ElementoSeleccionado=$('#como option:selected').val();
                if(ElementoSeleccionado=="REFERENCIA"){
                    $("#modal-ite").modal("show");
                }else{
                    $("#persona_id").val('');  
                }
        }
    </script>
@stop

