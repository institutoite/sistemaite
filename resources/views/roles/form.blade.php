<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class'=> 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder'=> 'Ingrese el nombre del rol']) !!}

    @error('name')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
    @enderror
</div>

<strong>Permisos</strong>
<br>
@error('permissions')
    <small class="text-danger">
        <strong>{{$message}}</strong>
    </small>
@enderror

@foreach ($permissions as $permission)
    <label>
        {!! Form::checkbox('$permission[]', $permission->id, null, ['class'  => 'mr-1']) !!}
        {{$permission->name}}
    </label>
@endforeach