

<a href="{{route('personas.edit', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Editar esta empresa">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('personas.show', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Ver esta empresa">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<form action=""  class="d-inline formulario eliminar">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar esta ciudad">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form> 

<a href="{{route('opcion.index', $id)}}" class="btn btn-outline-primary tooltipsC mr-2" title="ir a opciones de la persona">
    Opciones
</a>
