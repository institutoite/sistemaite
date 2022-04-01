

<a href="{{route('modalidads.edit', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Editar esta modalidad">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('modalidads.show', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Ver esta modalidad">
    <i class="fa fa-fw fa-eye text-secondary mostrar"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar esta modalidad">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form>     
