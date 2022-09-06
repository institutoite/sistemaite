<a href="{{route('mododocentes.edit', $id)}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Editar este mododocentes se entero">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>
<a href="{{route('mododocentes.show', $id)}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Ver esta como se entero">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>
<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" type="submit" class="btn eliminargenerico" title="Eliminar este como se entero">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form> 



