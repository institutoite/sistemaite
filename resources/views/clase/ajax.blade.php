@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop
@section('title', 'Provincias')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Clase</span>
                    </div>
                    <div class="card-body">
                    <input id="botoncito" class="btn btn-primary form-control" type="button" name="">
                    </div>

                    <div class="success">

                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection
@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
   
    <script>
              $(document).ready(function() {
            $('#botoncito').on('click',function(){
                var row=$(this);
                var id=row.data('id');
                //console.log(id);
                $.ajax({
                    url: "marcar/asistencia",
                    type:"GET",
                    success:function(response){
                        console.log(response);
                            $('.success').before('<h1>'+response.id+'</h1>');
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema'+status);
                        console.log(xhr);
                    },
                });
            });

            $('#tabla_hoy').dataTable({
                "responsive":true,
                "searching":false,
                "paging":   false,
                "autoWidth":false,
                "ordering": false,
                "info":     false,
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },  
                    { responsivePriority: 2, targets: -1 }
                ],
            });
        })

    </script>
    
@endsection
