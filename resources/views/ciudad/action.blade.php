

<a href="{{route('ciudades.edit', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Editar esta ciudad">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('ciudades.show', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Ver esta ciudad">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminargenerico" title="Eliminar este Pais">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form>     
