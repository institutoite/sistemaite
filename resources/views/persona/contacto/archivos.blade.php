@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop


@section('title', 'Contactos')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content')
    <div class="card">
        <div class="card-header">
            LISTADO DE VCF
            <div class="float-right">
                <a id="creararchivo" href="{{ route('crear.archivos.vcard',['inicio'=>2,'incremento'=>20]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                    {{('Crear archivo de contactos') }}
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <form class="row g-3" method="POST" action="{{ route('crear.archivos.vcard') }}">
                        @csrf
                        <div class="col-auto">
                            <input type="text" class="form-control" id="inicio" name="inicio"  placeholder="valor id inicio">
                        </div>
                        {{-- <div class="col-auto">
                            <input type="text" class="form-control" id="incremento" name="incremento" placeholder="valor incremento">
                        </div> --}}
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-bordered table-hover table-striped">
                <tbody>
                    @isset($archivos)
                        @foreach($archivos as $archivo)
                            @if($archivo[0] !== '.')
                                <tr>
                                    <td>{{ $archivo }}</td>
                                    <td>
                                    <form method="GET" action="{{ route('descargar_archivo') }}">
                                        <input type="hidden" name="archivo" value="{{ $archivo }}">
                                        <button class="btn btn-primary" type="submit">Descargar</button>
                                    </form>
                                    </td>
                                    <td>
                                        <button class="eliminar" data-archivo="{{ $archivo }}">Eliminar</button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
@stop


@section('js')
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
       
        // $("#creararchivo").on("click", function(e){
        //     e.preventDefault();
        //     console.log("click en crear archivo ");
        // });

        const botonesEliminar = document.querySelectorAll('.eliminar');
        botonesEliminar.forEach((boton) => {
            boton.addEventListener('click', (evento) => {
            const archivo = boton.getAttribute('data-archivo');
            if (confirm(`¿Está seguro que desea eliminar el archivo "${archivo}"?`)) {
                // Enviar una solicitud para eliminar el archivo
                fetch(`{{ route('eliminar_archivo') }}?archivo=${archivo}`)
                .then(() => {
                    // Eliminar la fila correspondiente de la tabla
                    const fila = boton.parentNode.parentNode;
                    fila.parentNode.removeChild(fila);
                })
                .catch((error) => {
                    console.error(error);
                });
            }
            });
        });
    </script>
@stop