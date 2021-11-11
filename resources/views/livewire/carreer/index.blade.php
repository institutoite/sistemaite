@extends('adminlte::page')
@section('css')
@endsection

@section('title', 'Carreras')

@section('content')
<div class="mt-3">
    <div class="card">
        <div class="card-header bg-secondary">
            Lista de carreras
        </div>
        <div class="card-body">
           @livewire('mostrar-carreras')
        </div>
    </div>
</div>   
@endsection

@section('js')

@endsection
