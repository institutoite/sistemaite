<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($errors->has('tema'))
            <span class="text-danger"> {{ $errors->first('tema')}}</span>
        @endif
    </div>
</div>
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% CAMPO NOMBRE %%%%%%%%%%%%%%%%%%%%%% --}}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" > 
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="tema" class="form-control @error('tema') is-invalid @enderror" value="{{old('tema',$tema->tema ?? '')}}">
            <label for="tema">tema</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($errors->has('materia_id'))
            <span class="text-danger"> {{ $errors->first('materia_id')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" > 
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('materia_id') is-invalid @enderror" name="materia_id" id="materia_id">
                <option value=""> Elija una materia</option>
                    @foreach ($materias as $item)
                        @isset($tema) 
                            <option value="{{ $item->id }}" {{ $item->id==$tema->materia_id ? 'selected':''}} >{{ $item->materia }}</option>
                        @else
                            <option value="{{ $item->id }}" {{ old('materia_id') == $item->id ? 'selected':''}} >{{ $item->materia }}</option>
                        @endisset
                    @endforeach 
            </select>
            <label for="tema">tema</label>
        </div>
    </div>
</div>
