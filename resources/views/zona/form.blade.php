<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">CIUDAD</label> 
        <select class="form-control" name="ciudad_id" id="ciudad_id">
            <option value=""> Elija una ciudad</option>
            @foreach ($ciudades as $item)
                @isset($zona)     
                    <option value="{{ $item->id }}" {{ $item->id==$zona->ciudad_id ? 'selected':''}} >{{ $item->ciudad }}</option>
                @else
                    <option value="{{ $item->id }}" {{ old('ciudad_id') == $item->id ? 'selected':'' }} >{{ $item->ciudad }}</option>
                @endisset 
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('ciudad_id'))
            <p class="text-danger"> {{ $errors->first('ciudad_id')}}</p>
        @endif
    </div>
</div>

{{-- $$$$$$$$$$$ CAMPO ZONA --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">ZONA</label> 
        <input  type="text" name="zona" id="zona" class="form-control" style="position:relative" value="{{old('zona',$zona->zona ?? '')}}" placeholder="ingrese una zona" autocomplete="off">
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('zona'))
            <p class="text-danger"> {{ $errors->first('zona')}}</p>
        @endif
    </div>
</div>
