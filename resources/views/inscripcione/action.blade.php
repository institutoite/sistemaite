

<a href="{{route('inscripciones.edit', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Editar esta inscripcione">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('inscripciones.show', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Ver esta inscripcione">
    <i class="fa fa-fw fa-eye text-secondary mostrar"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar esta inscripcione">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form>     
