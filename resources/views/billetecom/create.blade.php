@extends('adminlte::page')
@section('css')
<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Billetecom')

@section('content')
    <section class="content container-fluid pt-3">
        <div class="row">
            {{ Breadcrumbs::render('billetecom.crear', $computacion,$carrera,$persona,$matriculacion,$pago) }}
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('mensaje'))
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">{{ Auth::user()->name }}!  favor corregir el o los siguientes errores</h4> 
                            {{session('mensaje')}}
                            <ol>
                                @if(session('pagocon')!=$pago->pagocon)
                                    <li><strong>PAGO: </strong> Monto enviado en billetes es <strong>Bs. {{session('pagocon')}}</strong>  sin enbargo se pago:<strong>Bs. {{$pago->pagocon}}</strong></li>    
                                @endif
                                
                                @if(session('cambio')!=$pago->cambio)
                                    <li><strong>CAMBIO: </strong>Cambio enviado en billetes es <strong>Bs. {{session('cambio')}}</strong>   sin embargo el cambio debiera ser: <strong>Bs. {{$pago->cambio}}</strong> </li>
                                @endif

                                
                            </ol>
                    </div>
                @endif        
                        
                    <form method="POST" action="{{ route('billetecom.guardar', $pago)}}" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header bg-primary">
                               PAGOS {{$pago->pagocon}} Bs.
                            </div>
                            <div class="card-body border border-3 border-primary turqueza_suave">
                                @include('billetecom.form')
                                esto esta en billetes
                            </div>
                        </div>
                         <div class="card">
                            <div class="card-header bg-secondary">
                                CAMBIO {{$pago->cambio}} Bs.
                            </div>
                            <div class="card-body border border-3 border-secondary azul_suave">
                                @include('billetecom.formcambio')
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
