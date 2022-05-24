@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Dpto Create')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Departamento</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('departamentos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('departamento.form')
                            @include('include.botones')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
     

<aside class="control-sidebar control-sidebar-light">
  <!-- Content of control sidebar goes here -->
  <a class="btn btn-primary" href="#" data-toggle="control-sidebar">Toggle Control Sidebar</a>
  <a class="btn btn-primary" href="#" data-toggle="control-sidebar">Toggle Control Sidebar</a>
  <a class="btn btn-primary" href="#" data-toggle="control-sidebar">Toggle Control Sidebar</a>
  <a class="btn btn-primary" href="#" data-toggle="control-sidebar">Toggle Control Sidebar</a>
  <a class="btn btn-primary" href="#" data-toggle="control-sidebar">Toggle Control Sidebar</a>
  <a class="btn btn-primary" href="#" data-toggle="control-sidebar">Toggle Control Sidebar</a>
  <a class="btn btn-primary" href="#" data-toggle="control-sidebar">Toggle Control Sidebar</a>
  
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
<div class="control-sidebar-bg">
    
</div>
@endsection

@section('js')
    <script>

        //$("#my-toggle-button").controlSidebar(options);
    </script>
@endsection
