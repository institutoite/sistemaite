

<a href="{{route('paises.edit', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Editar este pais">
    <i class="fa fa-fw fa-edit text-primary"></i>Y
</a>

<a href="{{route('paises.show', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Ver este pais">
    <i class="fa fa-fw fa-eye text-primary mostrar"></i>Y
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar este Pais">
        <i class="fa fa-fw fa-trash text-danger"></i>   X
    </button>
</form>     
