

<a href="{{route('users.edit', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Editar este usuario">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('users.show', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Ver este usuario">
    <i class="fa fa-fw fa-eye text-primary mostrar"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" type="submit" class="btn eliminar" title="Eliminar este usuario">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form>     

<a href="{{route('messages.create', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Enviar mensaje">
    <i class="fa fa-fw fa-envelope text-primary mostrar"></i>
</a>
<a href="{{route('share.credentials', App\Models\Persona::find($id))}}" class="btn-accion-tabla tooltipsC mr-1" title="Compartir credenciales">
    <i class="fas fa-share-alt"></i>
</a>

