@extends('adminlte::page')

@section('title', 'Mensaje')

@section('content_header')
    <h1 class="text-center text-primary">Enviar mensaje</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Enviar mensaje
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'messages.store']) !!}
                    <div class="form-group">
                        {!! Form::label('subject', 'Asunto') !!}
                        {!! Form::text('subject', null, ['class'=> 'form-control' . ($errors->has('subject') ? ' border-red-600' : '')]) !!}
                    
                        @error('subject')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('body', 'Mensaje') !!}
                        {!! Form::textarea('body', null, ['class'=> 'form-control' . ($errors->has('body') ? ' border-red-600' : '')]) !!}
                    
                        @error('body')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div>
                            {!! Form::label('to_user_email', 'Destinatario') !!}
                            {!! Form::text('to_user_email', $user->email, ['class'=> 'form-control', 'readonly' => 'true']) !!}
                        </div>
                    </div>

                    {!! Form::hidden('to_user_id', $user->id) !!}
                    
                    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
