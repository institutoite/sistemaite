
{{-- {{dd($id)}} --}}
<a href="{{route('permiso.edit', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Editar este permiso">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminargenerico" title="Eliminar este permiso">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form>     
