<a href="{{route('personas.editar.contacto', $id)}}" class="tooltipsC mr-2" title="Editar este contacto">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<form action=""  class="d-inline formulario eliminargenerico">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn" title="Eliminar este contacto">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form> 

<a href="" class="tooltipsC mr-2 observacion" id="Persona" title="Agregar Observacion">
    <i class="fas fa-comment-alt"></i>
</a>
<a href="" class="tooltipsC mr-1 mostrarobservacionespersona" title="Mostrar observaciones">
    <i class="fas fa-comments text-secondary"></i>
</a>
<a href="{{route('descargar.contacto', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Descargar contacto">
    <i class="far fa-address-card"></i>
</a>

<a target='_blank' href='https://api.whatsapp.com/send?phone=591{{$telefono}}'><i class="fab fa-whatsapp"></i></a>