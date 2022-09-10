<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        @if($errors->has('nombre'))
        <span class="text-danger"> {{ $errors->first('nombre')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="nombre" id="nombre"  class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre',$comentario->nombre ?? '')}}" autocomplete="off">
            <label>Nombre</label>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        @if($errors->has('telefono'))
        <span class="text-danger"> {{ $errors->first('telefono')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="number" name="telefono" id="telefono"  class="form-control @error('telefono') is-invalid @enderror" value="{{old('telefono',$comentario->telefono ?? '')}}" autocomplete="off">
            <label>Telefono</label>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        @if($errors->has('telefono'))
        <span class="text-danger"> {{ $errors->first('telefono')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <select onchange="mostrarModal();" onfocus="this.selectedIndex = -1;"  class="form-control @error('como_id') is-invalid @enderror" data-old="{{ old('como_id') }}" name="como_id" id="como_id">
                <option value="" selected>Seleccionen como se enteró?</option>
                @foreach ($comos as $como)
                    @isset($comentario)     
                        <option  value="{{$como->id}}" {{$como->id==$comentario->como_id ? 'selected':''}}>{{$como->como}}</option>     
                    @else
                        <option value="{{ $como->id}}" {{ old('como_id') == $como->id ? 'selected':'' }} >{{ $como->como }}</option>
                    @endisset 
                @endforeach
            </select>
            <label>Como?</label>
        </div>
    </div>
</div> 

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        @if($errors->has('comentario'))
        <span class="text-danger"> {{ $errors->first('comentario')}}</span>
        @endif
    </div>
</div>
<label for="interests" class="">COMENTARIO</label>
@isset($commentario)
    <textarea placeholder="Ingrese un comentario"  name="comentario" rows="5" id="comentario" class="form-control @error('comentario') is-invalid @enderror" >{{old('comentario',$comentario->comentario ?? '')}}</textarea>
@else
    <textarea placeholder="Ingrese un comentario"  name="comentario" rows="5" id="comentario" class="form-control @error('comentario') is-invalid @enderror" >{{old('comentario',$comentario->comentario ?? '')}}</textarea>
@endisset

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        @if($errors->has('interests'))
        <span class="text-danger"> {{ $errors->first('interests')}}</span>
        @endif
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 @error('interests') is-invalid @enderror">
        <table class="" width="100%">
                <tbody>
                <tr>
                @php
                    $k=1;
                @endphp
                @isset($comentario)
                    @foreach ($interests_currents as $current)
                        @if($k % 5 != 0)
                            <td>
                                <div class='form-check form-switch'>
                                <input class="form-check-input" type="checkbox" name="interests[{{$current->id}}]" checked value="{{$current->interest}}" id="{{$current->id}}">
                            <label class="form-check-label" for="{{$current->id}}">{{$current->interest}}</label>
                            </div></td>
                        @else
                            </tr>
                            <tr>
                        @endif
                        @php
                            $k=$k+1;
                        @endphp
                    @endforeach
                    @foreach ($interests_faltantes as $faltante)
                        @if($k % 5 != 0)
                            <td>
                                <div class='form-check form-switch'>
                                <input class="form-check-input" type="checkbox" name="interests[{{$faltante->id}}]"  value="{{$faltante->interest}}" id="{{$faltante->id}}">
                                <label class="form-check-label" for="{{$faltante->id}}">{{$faltante->interest}}</label>
                            </div></td>
                        @else
                            </tr>
                            <tr>
                        @endif
                        @php
                            $k=$k+1;
                        @endphp
                    @endforeach
                @else
                    @foreach ($interests as $interest)
                        @if($k % 5 != 0)
                            <td>
                                <div class='form-check form-switch'>
                                <input class="form-check-input" type="checkbox" name="interests[{{$interest->id}}]" value="{{$interest->id}}" id="{{$interest->interest}}">
                                <label class="form-check-label" for="{{$interest->interest}}">{{$interest->interest}}</label>
                            </div></td>
                        @else
                            </tr>
                            <tr>
                        @endif
                        @php
                            $k=$k+1;
                        @endphp
                    @endforeach        
                @endisset
            </tbody>
        </table>
    </div>
</div>