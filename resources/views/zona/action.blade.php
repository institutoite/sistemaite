

    <a href="{{route('zonas.edit', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Editar este pais">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('zonas.show', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Ver este pais">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminargenerico" title="Eliminar esta zona">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form>     

