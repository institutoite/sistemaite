<a href="{{route('prospecto.edit', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Editar este provincia">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>
<a href="{{route('prospecto.view', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Editar este provincia">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<a href="" class="tooltipsC mr-2 observacion" id="Prospecto" title="Agregar Observacion">
    <i class="fas fa-comment-alt"></i>
</a>

<a href="" class="tooltipsC mr-1 mostrarobservacionesprospecto" title="Mostrar observaciones">
    <i class="fas fa-comments text-secondary"></i>
</a>

<a target='_blank' href="https://wa.me/591{{ $telefono }}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Enviar mensaje">
    <i class="fab fa-whatsapp"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminargenerico" title="Eliminar este prospecto">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form>   