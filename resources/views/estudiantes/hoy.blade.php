@extends('adminlte::page')

@section('title', 'Resumen Hoy')

@section('content')
    <section class="content container-fluid">
        {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% YA PASARON Y SE FUERON --}}
        <div class="card">
            <div class="card-header">
                Estudiantes que ya pasaron clases y se fueron
            </div>
            <div class="card-body">
                
            </div>
        </div>
         {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% ESTUDIANTES QUE ESTAN PRESENTES --}}
        <div class="card">
            <div class="card-header">
                Estudiantes Presentes
            </div>
            <div class="card-body">

            </div>
        </div>
         {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% ESTUDIANTES QUE SE FALTARON --}}
        <div class="card">
            <div class="card-header">
                Estudiantes que se faltaron
            </div>
            <div class="card-body">

            </div>
        </div>

         {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% ESTUDIANTES QUE PIDIERON LICENCIA HOY --}}
        <div class="card">
            <div class="card-header">
                Estudiantes que pidieron Licencia
            </div>
            <div class="card-body">

            </div>
        </div>
         {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% ESTUDIANTES QUE AUN NO LLEGARON --}}
        <div class="card">
            <div class="card-header">
                Estudiantes que aun no llegan
            </div>
            <div class="card-body">

            </div>
        </div>
    </section>
@endsection
