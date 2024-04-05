@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Crear Contacto')
@section('plugins.Jquery', true)
@section('plugins.Datatables', true)
@section('content')
    <div class="card">
        <div class="card-header bg-secondary">
            CREAR CONTACTO SUPER RAPIDO  <h3 class="text-white float-right" id="tokenExpirationform"></h3>
        </div>
        <div class="card-body">
            <form action="{{route('personas.store.contacto')}}" id="formulario" method="post" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                @csrf
                @include('persona.contacto.formcontacto')
                
                @include('include.botones')

              

            </form>
        </div>
    </div>

    @if($tiempoToken==0)
        @include('include.modalGContact')
    @endif
@stop

@section('js')
<script type="text/javascript" src="{{ asset('dist/js/jquery.leanModal.min.js')}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%% CKEDITOR --}}
    <script>

       CKEDITOR.replace('observacion');
       
       
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{asset('assets/js/tiempoGcontact.js')}}"></script>

    
@stop

