@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop
@section('title', 'Periodo')
@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)
@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Crear Periodo <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('periodable.index')}}">Listar Periodos</a>
        </div>
        <div class="card-body">
            <form action="{{route('periodable.store')}}" method="POST">
                @csrf
                @include('periodable.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop
@section('js')
<script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
<script>
    $(document).ready(function() {
        $("#fechaini").change(function(){
            fechainicio = moment($("#fechaini").val());
            fechafin=moment(fechainicio.add(1,'months').format('YYYY-MM-DD'));
            $("#fechafin").val(fechafin.format('YYYY-MM-DD'));
            console.log(fechainicio);
            console.log(fechafin);
        });
    });
</script>
@stop