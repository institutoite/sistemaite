

<a href="{{route('grado.edit', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Editar este grado">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('grado.show', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Ver este grado">
    <i class="fa fa-fw fa-eye text-secondary mostrar"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar este grado">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form>     
