@extends('adminlte::page')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Grado')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')
                    <form method="POST" action="{{ route('billetes.guardar', $pago->id)}}" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header bg-primary">
                                PAGOS {{$pago->monto}} Bs.
                            </div>
                            <div class="card-body border border-3 border-primary turqueza_suave">
                                @include('billete.form')
                            </div>
                        </div>
                         <div class="card">
                            <div class="card-header bg-secondary">
                                PAGOS {{$pago->cambio}} Bs.
                            </div>
                            <div class="card-body border border-3 border-secondary azul_suave">
                                @include('billete.formcambio')
                            </div>
                        </div>

                        <div class="box-footer mt20 text-center">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div> 
                        
                    </form>
            </div>
        </div>
    </section>
@endsection
