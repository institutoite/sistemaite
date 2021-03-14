@extends('adminlte::page')

@section('css')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Paises')

@section('content_header')
    <h1 class="text-center text-primary">Paises</h1>
    
@stop

@section('content')
  
    <table id="paises" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>PAIS</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
          
    </table>
    
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#paises').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,

                    "ajax": "{{ url('api/paises') }}",
                    "columns": [
                        {data: 'id'},
                        {data:'nombrepais'},
                        {data: 'btn'},
                    ],
                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },

                }
            );


            function eliminar(codigo) {
                parametros={"id":codigo};
                $.ajax({
                    data:parametros,
                    url:"",
                    type:"POST",
                    beforeSend:function(){},
                    succes:function(){
                        table.ajax.reaload();
                        
                    }

                });
            }




            
            $('table').on('click','.eliminar',function (e) {
                e.preventDefault();   
                Swal.fire({
                    title: 'Estas seguro(a) de eliminar este registro?',
                    text: "Si eliminas el registro no lo podras recuperar jamás!",
                    icon: 'question',
                    showCancelButton: true,
                    showConfirmButton:true,
                    confirmButtonColor: '#25ff80',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar..!',
                    position:'center',        
                }).then((result) => {
                    if (result.value) {
                        var $form=$(this).parent();
                        $form.append('<input name="_token" type="hidden" value="' + $('meta[name="csrf-token"]').attr('content') + '">');
                        
                        console.log('_token');
                        $(this).parent().submit();
                        
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 400,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                            })

                            Toast.fire({
                            icon: 'success',
                            title: 'Eliminado correctamente'
                            })
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
                            title: 'No se eliminó el registro'
                        })
                    }
                })
            });
        } );
    </script>
@stop