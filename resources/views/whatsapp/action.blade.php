

<a href="{{ route('mensaje.edit', $id) }}" class="btn-accion-tabla tooltipsC mr-2 editar" title="Editar este mensaje">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{ route('mensaje.show',$id) }}" class="btn-accion-tabla tooltipsC mr-2 mostrar" title="Ver este mensaje">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<form action=""  class="d-inline formulario eliminar">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar este mensaje">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form> 