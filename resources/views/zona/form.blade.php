<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($errors->has('ciudad_id'))
            <span class="text-danger"> {{ $errors->first('ciudad_id')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" > 
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('ciudad_id') is-invalid @enderror" name="ciudad_id" id="ciudad_id">
                <option value=""> Elija una ciudad</option>
                @foreach ($ciudades as $item)
                    @isset($zona)     
                        <option value="{{ $item->id }}" {{ $item->id==$zona->ciudad_id ? 'selected':''}} >{{ $item->ciudad }}</option>
                    @else
                        <option value="{{ $item->id }}" {{ old('ciudad_id') == $item->id ? 'selected':'' }} >{{ $item->ciudad }}</option>
                    @endisset 
                @endforeach
            </select>
            <label for="tema">tema</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm">    
        @if($errors->has('zona'))
        <span class="text-danger"> {{ $errors->first('zona')}}</span>
        @endif
    </div>
</div> 
<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="zona" id="zona" class="form-control" style="position:relative" value="{{old('zona',$zona->zona ?? '')}}" placeholder="ingrese una zona" autocomplete="off">
            <label for="zona">Ingrese un zona</label>
        </div>
    </div>
</div> 
