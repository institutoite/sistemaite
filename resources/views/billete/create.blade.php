@extends('adminlte::page')
@section('css')
<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Billetes')

@section('content')
    <section class="content container-fluid pt-3">
        <div class="row">
            {{-- {{dd($pago->pagable->estudiante)}} --}}
            {{ Breadcrumbs::render('billete.crear',$pago->pagable->estudiante,$pago->pagable->estudiante->persona, $pago->pagable,$pago) }}
            <div class="col-md-12">
                @if(Session::has('mensaje'))
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">{{ Auth::user()->name }}!  favor corregir el o los siguientes errores</h4> 
                            {{session('mensaje')}}
                            <ol>
                                @if(session('monto')!=$pago->monto)
                                    <li><strong>PAGO: </strong> Monto enviado en billetes es <strong>Bs. {{session('monto')}}</strong>  sin enbargo se pago:<strong>Bs. {{$pago->monto}}</strong></li>    
                                @endif
                                
                                @if(session('cambio')!=$pago->cambio)
                                    <li><strong>CAMBIO: </strong>Cambio enviado en billetes es <strong>Bs. {{session('cambio')}}</strong>   sin embargo el cambio debiera ser: <strong>Bs. {{$pago->cambio}}</strong> </li>
                                @endif

                                
                            </ol>
                    </div>
                @endif        
                    
                    <form method="POST" action="{{ route('billetes.guardar', $pago)}}" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header bg-primary">
                                PAGOS {{$pago->pagocon}} Bs.
                            </div>
                            <div class="card-body border border-3 border-primary turqueza_suave">
                                @include('billete.form')
                                
                            </div>
                        </div>
                         <div class="card">
                            <div class="card-header bg-secondary">
                                CAMBIO {{$pago->cambio}} Bs.
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
