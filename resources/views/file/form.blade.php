<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('modalidad') }}
            {{ Form::text('modalidad', $modalidad->modalidad, ['class' => 'form-control' . ($errors->has('modalidad') ? ' is-invalid' : ''), 'placeholder' => 'Modalidad']) }}
            {!! $errors->first('modalidad', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('costo') }}
            {{ Form::text('costo', $modalidad->costo, ['class' => 'form-control' . ($errors->has('costo') ? ' is-invalid' : ''), 'placeholder' => 'Costo']) }}
            {!! $errors->first('costo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cargahoraria') }}
            {{ Form::text('cargahoraria', $modalidad->cargahoraria, ['class' => 'form-control' . ($errors->has('cargahoraria') ? ' is-invalid' : ''), 'placeholder' => 'Cargahoraria']) }}
            {!! $errors->first('cargahoraria', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        {{ Form::label('Nivel') }}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group text-sm" >
                <div class="input-group mb-2" >
                    
                    <select class="form-control @error('nivel_id') is-invalid @enderror" data-old="{{ old('nivel_id') }}" name="nivel_id" id="nivel">
                        <option value="">Seleccione nivel</option>
                        @foreach ($niveles as $nivel)
                            @isset($modalidad)     
                                <option  value="{{$nivel->id}}" {{$nivel->id==$modalidad->nivel_id ? 'selected':''}}>{{$nivel->nivel}}</option>     
                            @else
                                <option value="{{ $nivel->id }}" {{ old('nivel_id') == $nivel->id ? 'selected':'' }} >{{ $nivel->nivel }}</option>
                            @endisset 
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>