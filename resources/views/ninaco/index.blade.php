
@extends('adminlte::page')
@section('css')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@stop
@section('title', 'Provincias')

@section('content')
    <div class="container">
        <livewire:datatable
            model="App\Models\Ninaco"
            sercheable=name
        >
    </div>
@endsection
@section('js')
    
@stop