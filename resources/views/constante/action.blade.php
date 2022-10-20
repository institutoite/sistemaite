<a href="{{route('constante.edit', $id)}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Editar este constante se entero">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>
<a href="{{route('constante.show', $id)}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Ver esta constante se entero">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminargenerico" title="Eliminar este comentario">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form> 
