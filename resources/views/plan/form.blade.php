
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('titulo'))
            <span class="text-danger"> {{ $errors->first('titulo')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="titulo" id="titulo"  class="form-control @error('titulo') is-invalid @enderror" value="{{old('titulo',$plan->titulo ?? '')}}" autocomplete="off">
            <label for="titulo">Título nuevo plan</label>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('costo'))
            <span class="text-danger"> {{ $errors->first('costo')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="number" name="costo" id="costo"  class="form-control @error('costo') is-invalid @enderror" value="{{old('costo',$plan->costo ?? '')}}" autocomplete="off">
            <label for="costo">Costo de plan</label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('convenio_id'))
            <span class="text-danger"> {{ $errors->first('convenio_id')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('convenio_id') is-invalid @enderror" data-old="{{ old('convenio_id') }}" name="convenio_id" id="convenio_id">
                <option value="">Elija un convenio</option>
                @foreach ($convenios as $convenio)
                    @isset($plan)     
                        <option  value="{{$convenio->id}}" {{$convenio->id==$plan->convenio_id ? 'selected':''}}>{{$convenio->titulo}}</option>     
                    @else
                        <option value="{{ $convenio->id }}" {{ old('convenio_id') == $convenio->id ? 'selected':'' }} >{{ $convenio->titulo }}</option>
                    @endisset 
                @endforeach
            </select>
            <label for="convenio_id">Elija convenio</label>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        @if($errors->has('foto'))
            <span class="text-danger"> {{ $errors->first('foto')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        @if($errors->has('descripcion'))
            <span class="text-danger"> {{ $errors->first('descripcion')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
        <div class="card">
    
            <div class="card-body">
                <div class="border-danger text-center">
                    @isset($plan)
                    <img src="{{URL::to('/').Storage::url("$plan->foto")}}" class="rounded img-thumbnail img-fluid border-primary border-5" alt="{{$plan->titulo}}" width="350" height="350">
                    <input class="form-contgrol" type="file" accept=".png, .jpg, .jpeg, .gif" name="foto" id="foto" data-classButton="btn btn-success" data-input="false" data-classIcon="icon-plus">                
                    @else
                    <input type="file" accept=".png, .jpg, .jpeg, .gif" name="foto" id="foto" data-classButton="btn btn-success" data-input="false" data-classIcon="icon-plus">                
                    @endisset
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
        <div class="form-floating mb-3 text-gray">
            <textarea rows="12" placeholder="Ingrese una descripción de este convenio"  name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" >{{old('descripcion',$plan->descripcion ?? '')}}</textarea>
        </div>
    </div>
</div>

