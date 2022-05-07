{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO  FECHA NACIMIENTO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                <textarea placeholder="Ingrese una descripcion del archivo que va subir maximimo 500 caracteres"  name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" >{{old('descripcion',$file->descripcion ?? '')}}</textarea>
            </div>
        </div>


        <div class="mb-3">
            <label for="file" class="form-label">Seleccine un archivo </label>
            <input class="form-control form-control-lg" id="file"  name="file" type="file" accept=".jpg,.jpeg,.pub,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip">
        </div>

        @isset($file)
        <div class="alert alert-primary mt-3" role="alert">
            Subir un archivo solo en caso de querer cambiar, sugiero que descargue para ver el archivo asociado
        </div>
        <a href="{{route('file.download',$file->id)}}">Desargar y Ver archivo</a>
        @endisset
            