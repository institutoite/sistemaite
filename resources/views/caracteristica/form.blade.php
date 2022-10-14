<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('plan_id'))
            <span class="text-danger"> {{ $errors->first('plan_id')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('plan_id') is-invalid @enderror" data-old="{{ old('plan_id') }}" name="plan_id" id="plan_id">
                <option value="">Elija un plan</option>
                @foreach ($planes as $plan)
                    @isset($caracteristica)     
                        <option  value="{{$plan->id}}" {{$plan->id==$caracteristica->plan_id ? 'selected':''}}>{{$plan->titulo}}</option>     
                    @else
                        <option value="{{ $plan->id }}" {{ old('plan_id') == $plan->id ? 'selected':'' }} >{{ $plan->titulo }}</option>
                    @endisset 
                @endforeach
            </select>
            <label for="plan_id">Elija plan</label>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($errors->has('caracteristica'))
            <span class="text-danger"> {{ $errors->first('caracteristica')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <textarea rows="4" placeholder="Ingrese una caracteristica de este plan"  name="caracteristica" id="caracteristica" class="form-control @error('caracteristica') is-invalid @enderror" >{{old('caracteristica',$caracteristica->caracteristica ?? '')}}</textarea>
        </div>
    </div>
</div>

