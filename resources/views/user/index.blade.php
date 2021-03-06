@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Usuarios')

@section('plugins.Jquery', true)
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1 class="text-center text-primary">Usuarios</h1>
@stop

@section('content')
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('User') }}
                            </span>

                            <div class="float-right">
                                <a href="{{route('users.crear')}}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear nuevo usuario') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if (Session::has('success'))
                        <script>
                            const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                            })
                            Toast.fire({
                            icon: 'success',
                            title: 'Datos actualizados correctamente'
                            })
                        </script>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="usuarios" class="table table-striped table-hover table-bordered">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
										<th>Name</th>
										<th>Email</th>
										<th>Foto</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.all.min.js" integrity="sha512-kW/Di7T8diljfKY9/VU2ybQZSQrbClTiUuk13fK/TIvlEB1XqEdhlUp9D+BHGYuEoS9ZQTd3D8fr9iE74LvCkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@section('js')
    
    <script>
    $(document).ready(function() {
        var tabla=$('#usuarios').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,

                    "ajax": "{{ url('api/usuarios') }}",
                    "columns": [
                        {data: 'id'},
                        {data: 'name'},
                        {data: 'email'},
                        {
                            "name": "foto",
                            "data": "foto",
                            "render": function (data, type, full, meta) {
                                return "<img class='materialboxed' src=\"{{URL::to('/')}}/storage/" + data + "\" height=\"50\"/>";
                            },
                            "title": "FOTO",
                            "orderable": false,
            
                        },     
                        {
                            "name":"btn",
                            "data": 'btn',
                            "orderable": false,
                        },
                    ],
                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },  
                }
            );

            $('table').on('click','.eliminar',function (e) {
                e.preventDefault(); 
                id=$(this).parent().parent().parent().find('td').first().html();
                console.log(id);
                Swal.fire({
                    title: 'Estas seguro(a) de eliminar este registro?',
                    text: "Si eliminas el registro no lo podras recuperar jam??s!",
                    icon: 'question',
                    showCancelButton: true,
                    showConfirmButton:true,
                    confirmButtonColor: '#25ff80',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar..!',
                    position:'center',        
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: 'eliminar/usuario/'+id,
                            type: 'DELETE',
                            data:{
                                id:id,
                                _token:'{{ csrf_token() }}'
                            },
                            success: function(result) {
                                tabla.ajax.reload();
                                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                                })
                                Toast.fire({
                                icon: 'success',
                                title: 'Se elimin?? correctamente el registro'
                                })   
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                switch (xhr.status) {
                                    case 500:
                                        Swal.fire({
                                            title: 'No se pudo eliminar el registro Codigo error:500',
                                            showClass: {
                                                popup: 'animate__animated animate__fadeInDown'
                                            },
                                            hideClass: {
                                                popup: 'animate__animated animate__fadeOutUp'
                                            }
                                        })
                                        break;
                                
                                    default:
                                        break;
                                }
                                
                            }
                        });
                    }else{
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 4000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'error',
                            title: 'No se elimin?? el registro'
                        })
                    }
                })
            });
       
    } );
    </script>
@stop