@extends('adminlte::page')
@section('css')
    
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Usuarios')

@section('content_header')
    <div class="d-flex">
        <h1>CREAR USUARIO</h1>
        <a href="{{route('users.index')}}" class="ml-auto">
            <button class="btn btn-primary">
            Listar Usuarios
        </button>
        </a>
    </div>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @if (Session::has('success'))
                  <script>
                      console.log("llega success");
                  </script>
                    <div class="alert alert-primary" role="alert">
                        <h4 class="alert-heading">Header</h4>
                        {{$message}}
                    </div>
                @endif

                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Create User</span>
                    </div>
                    <div class="card-body">
                       <form action="{{route('user.guardar')}}" method="post" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                            {{ csrf_field() }}
                            @include('user.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    
@endsection
@section('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#persona_id").select2({
                ajax: {
                    url: 'personas/select',
                    dataType: 'json'
                },
                placeholder: "Seleccione un tema (Opcional)",
                theme: "bootstrap-5",
                language: "es",
                containerCssClass: "select2--large", // For Select2 v4.0
                selectionCssClass: "select2--large", // For Select2 v4.1
                dropdownCssClass: "select2--large",
            });
            function cargarTemas(){
                var materia_id = $('#materia_id').val();
                if(!materia_id){
                $('#tema_id').html('<option value="" required>Seleccione un tema </option>');
                    return;
                }
                var html_select="";
                $.get('../../../api/temas/'+ materia_id,function (data) {
                    
                    html_select='<option value="">Seleccione un tema </option>';
                    for (var i = 0; i < data.length; i++) {
                        html_select+='<option value="'+ data[i].id +'">' +data[i].tema +'</option>';
                    }
                    
                    //$('#tema_id').html("<option value="">Si tema</option>");
                    $('#tema_id').html(html_select);
                    //console.log(html_select);
                });
            }
            $('#materia_id').on('change', cargarTemas);
            cargarTemas();
        });
    </script>
@endsection
