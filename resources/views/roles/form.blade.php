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
    <br>
@enderror

<div class="row">
    @foreach ($permissions as $permission)
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 border-danger" >
                <div class="form-check form-switch">
                    {!! Form::checkbox('permissions[]', $permission->id, null, ['class'  => 'form-check-input','id'=>$permission->id]) !!}
                    <label class="form-check-label" for="{{$permission->id}}">{{$permission->name}}</label>
                </div>
                
                
        </div>
        
    @endforeach
</div>