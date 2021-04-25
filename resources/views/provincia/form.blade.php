<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('provincia') }}
            {{ Form::text('provincia', $provincia->provincia, ['class' => 'form-control' . ($errors->has('provincia') ? ' is-invalid' : ''), 'placeholder' => 'Escriba nombre de Provincia']) }}
            {!! $errors->first('provincia', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('departamento') }}
            
            <div class="input-group mb-2" >
                
                <select class="form-control @error('departamento_id') is-invalid @enderror" name="departamento_id" id="departamento">
                    <option value="" > Seleccione un departamento</option>
                    {{-- $provincia es la provincia que llega desde Metodo edit $prov es cada una de todas la provincias que llegan para iterar--}}
                    @foreach ($departamentos as $departamento)
                        @isset($provincia)     
                            <option  value="{{$departamento->id}}" {{$provincia->departamento_id==$departamento->id ? 'selected':''}}>{{$departamento->departamento}}</option>     
                        @else
                            <option value="{{ $departamento->id }}" {{ old('departamento_id') == $departamento->id ? 'selected':'' }} >{{ $departamento->departamento }}</option>
                        @endisset  
                    @endforeach
                </select>
            </div>
            
        </div>
        {{-- {{dd($provincia)}} --}}
        

    
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>