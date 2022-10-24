<a href="{{route('periodable.edit', $id)}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Editar este periodo">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>
<a href="{{route('periodable.show', $id)}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Ver esta periodo">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" type="submit" class="btn eliminargenerico" title="Eliminar este periodo">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form>

