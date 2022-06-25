<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('descripcion'))
            <span class="text-danger"> {{ $errors->first('descripcion')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <textarea placeholder="Ingrese una descripcion del archivo que va subir maximimo 500 caracteres"  name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" >{{old('descripcion',$file->descripcion ?? '')}}</textarea>
    </div>
</div>

<div class="row mt-5">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('file'))
            <span class="text-danger"> {{ $errors->first('file')}}</span>
        @endif
    </div>
</div>
<div class="mb-3">
    <input class="form-control form-control-lg @error('file') is-invalid @enderror" id="file"  name="file" type="file" accept=".jpg,.jpeg,.pub,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip">
</div>

@isset($file)
<div class="alert alert-primary mt-3" role="alert">
    Subir un archivo solo en caso de querer cambiar, sugiero que descargue para ver el archivo asociado
</div>
<a href="{{route('file.download',$file->id)}}">Desargar y Ver archivo</a>
@endisset
    