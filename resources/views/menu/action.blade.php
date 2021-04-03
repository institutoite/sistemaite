

<a href="{{route('usuarios.edit', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Editar este usuario">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('usuarios.show', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Ver este usuario">
    <i class="fa fa-fw fa-eye text-primary mostrar"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar este usuario">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form>     
