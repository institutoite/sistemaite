<a href="{{ route('dias.edit',$id) }}" class="btn-accion-tabla tooltipsC mr-2 editar" title="Editar este tipo de archivo">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminargenerico" title="Eliminar este departamento">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form>     


