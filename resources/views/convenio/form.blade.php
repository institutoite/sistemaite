
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
            <input  type="text" name="titulo" id="titulo"  class="form-control @error('titulo') is-invalid @enderror" value="{{old('titulo',$convenio->titulo ?? '')}}" autocomplete="off">
            <label for="titulo">Título de convenio</label>
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
                    @isset($convenio)
                    <img src="{{URL::to('/').Storage::url("$convenio->foto")}}" class="rounded img-thumbnail img-fluid border-primary border-5" alt="{{$convenio->titulo}}" width="350" height="350">
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
            <textarea rows="12" placeholder="Ingrese una descripción de este convenio"  name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" >{{old('descripcion',$convenio->descripcion ?? '')}}</textarea>
        </div>
    </div>
</div>

