<a href="{{route('personas.edit', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Editar esta persona">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>
<a href="{{route('personas.show', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Ver esta persona">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<form action="" class="d-inline formulario eliminar">
    @csrf 
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar esta persona">
        <i class="fa fa-fw fa-trash text-danger"></i>
    </button>
</form>

{{-- <a href="{{route('opcion.principal', $id)}}" class="btn btn-outline-primary tooltipsC mr-2" title="ir a opciones de la persona">
    Opciones
</a> --}}

<a href="{{route('personas.agregar.papel', $id)}}" class="btn btn-outline-primary tooltipsC mr-2" title="ir a opciones de la persona">
    Agregar Papel
</a>

{{-- <a href="" class="btn-accion-tabla tooltipsC btn-sm mr-2 observacion" id="Persona" title="Agregar Observacion">
    <i class="fas fa-comment-alt fa-2x"></i>
</a> --}}
<a href="{{route('descargar.contacto', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Descargar contacto">
    <i class="far fa-address-card fa-2x"></i>
</a>

<a href="{{route('administrativo.crear', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Hacer administrativo">
    <i class="fas fa-user-cog fa-2x"></i>
</a>


