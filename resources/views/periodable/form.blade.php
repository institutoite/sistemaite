
<input  type="number" class="form-control" name="periodable_id" value="{{$periodable_id}}">
<input  type="text" class="form-control" name="periodable_type" value="{{$periodable_type}}">



<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        @if($errors->has('fechaini'))
            <span class="text-danger"> {{ $errors->first('fechaini')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        @if($errors->has('fechafin'))
            <span class="text-danger"> {{ $errors->first('fechafin')}}</span>
        @endif
    </div>
</div>

 <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
        <div class="form-floating mb-3 text-gray">
            @isset($fechapago)
                <input  type="date" name="fechaini" id="fechaini" class="form-control @error('fechaini') is-invalid @enderror" value="{{old('fechaini',$fechapago->format('Y-m-d') ?? '')}}">
            @else
                <input  type="date" name="fechaini" id="fechaini" class="form-control @error('fechaini') is-invalid @enderror" value="{{old('fechaini')}}">
            @endisset
            <label for="fechaini">Fecha Ini</label>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
        <div class="form-floating mb-3 text-gray">
            @isset($fechafin)
                <input  type="date" name="fechafin" id="fechafin" class="form-control @error('fechafin') is-invalid @enderror" value="{{old('fechafin',$fechafin->format('Y-m-d') ?? '')}}">
            @else
                <input  type="date" name="fechafin" id="fechafin" class="form-control @error('fechafin') is-invalid @enderror" value="{{old('fechafin')}}">
            @endisset
            <label for="fechafin">Fecha Fin</label>
        </div>
    </div>
</div>