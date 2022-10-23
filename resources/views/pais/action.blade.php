

<a href="{{route('paises.edit', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Editar este pais">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('paises.show', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Ver este pais">
    <i class="fa fa-fw fa-eye text-primary mostrar"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminargenerico" title="Eliminar este Pais">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form>     
