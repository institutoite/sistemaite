@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Apoderado')
@section('plugins.Jquery', true)
@section('plugins.SweetAlert', true)
@section('plugins.Datatables', true)


@section('content_header')
    <h1 class="text-center text-primary">Buscar apoderado</h1>
@stop

@section('content')
    <table id="apoderados" class="table table-bordered table-hover table-striped">
        <thead class="bg-primary text-center">

            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>FOTO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apoderados as $apoderado)
                <tr>
                    <td>{{$apoderado->id}}</td>
                    <td>{{$apoderado->nombre}}</td>
                    <td><img width="100" class="img-thumbnail" src="{{URL::to('/').'/'.'storage/'.$apoderado->foto}}" alt=""></td>
                    <td>
                        <a href="{{route('agregar.apoderado',['persona_id'=>$persona->id,'apoderado_id'=>$apoderado->id])}}" class="btn btn-outline-primary" title="ir a opciones de la persona">
                            Seleccionar<i class="fas fa-user-check"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('js')
    
   
    <!-- JavaScript Bundle with Popper -->
    

    <script>
        $(document).ready(function() {
        
        var tabla=$('#apoderados').DataTable(
                {
                    // "serverSide": true,
                    // "responsive":true,
                    // "autoWidth":false,

                    // "ajax": "{{-- url('api/apoderados') --}}",
                    // "columns": [
                    //     {data: 'id'},
                    //     {data: 'nombre'},
                    //     {
                    //         "name": "foto",
                    //         "data": "foto",
                    //         "render": function (data, type, full, meta) {
                    //             return "<img class='materialboxed' src=\"{{URL::to('/')}}/storage/" + data + "\" height=\"50\"/>";
                    //         },
                    //         "title": "FOTO",
                    //         "orderable": false,
            
                    //     },     
                    //     {
                    //         "name":"btn",
                    //         "data": 'btn',
                    //         "orderable": false,
                    //     },
                    // ],
                    // "language":{
                    //     "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    // },  
                }
            );

            $('table').on('click','.eliminar',function (e) {
                e.preventDefault(); 
                id=$(this).parent().parent().parent().find('td').first().html();
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
                            url: 'eliminar/persona/'+id,
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
                                            title: 'No se complet?? esta operaci??n por que este registro est?? relacionado con otros registros',
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