

<a href="{{route('departamentos.edit', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Editar este departamento">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('departamentos.show', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Ver este departamento">
    <i class="fa fa-fw fa-eye text-secondary mostrar"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminargenerico" title="Eliminar este departamento">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form>     
