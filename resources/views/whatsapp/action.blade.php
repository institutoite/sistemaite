

<a href="{{ route('mensaje.edit', $id) }}" class="btn-accion-tabla tooltipsC mr-2 editar" title="Editar este mensaje">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{ route('mensaje.show',$id) }}" class="btn-accion-tabla tooltipsC mr-2 mostrar" title="Ver este mensaje">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminargenerico" title="Eliminar este mensaje">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form> 

<a class='btn-accion-tabla tooltipsC btn-sm mr-2 bajamensaje' title='Dar de Baja  esta mensaje'>
    <i class="fas fa-arrow-down text-danger"></i>
</a>
<a class='btn-accion-tabla tooltipsC btn-sm mr-2 altamensaje' title='Dar de Alta esta mensaje'>
    <i class="fas fa-arrow-up text-success"></i>
</a>