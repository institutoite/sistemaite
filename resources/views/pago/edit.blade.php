@extends('adminlte::page')
@section('css')
     <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Pago Editar')
{{-- @section('plugins.Jquery', true)
@section('plugins.SweetAlert2', true)
@section('plugins.Datatables', true) --}}

@section('content')
    <section class="content container-fluid pt-3">
        <div class="card card-default">
            <div class="card-header bg-secondary">
                <span class="card-title">Actualizar Pago</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('pago.actualizar', $pago) }}"  role="form" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    @csrf
                    @include('pago.formeditar')
                    @include('include.botones')
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
 
    <script>
        $(document).ready(function(){
            $('#pagocon').change(function(){
                $('#cambio').val($(this).val()-$('#monto').val());
            });
            $('#monto').change(function(){
                $('#cambio').val($('#pagocon').val()-$('#monto').val());
            });
        });
    </script>
@endsection
