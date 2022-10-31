
@isset($id)
    
<a href="{{route('personas.edit', $id)}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Editar esta persona">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('personas.show', $id)}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Ver esta persona">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminargenerico" title="Eliminar esta persona">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form> 



<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Disabled tooltip">
    <a href="{{route('opcion.principal', App\Models\Computacion::findOrFail($id)->persona->estudiante->id)}}" class="btn btn-primary text-white tooltipsC mr-2" title="ir a opciones de matematicas">
         <i class="fas fa-bars"></i> &nbsp; Opciones
    </a>
</span>


<a href="{{route('opcion.computacion', $id)}}" class="btn btn-primary text-white tooltipsC btn-sm mr-2" title="ir a opciones de la persona">
    agregar
</a>

@endisset

<a href="" class="btn-accion-tabla tooltipsC btn-sm mr-2 observacion" id="Computacion" title="Agregar Observacion">
    <i class="fas fa-comment-alt fa-2x"></i>
</a>
<a href="" class="tooltipsC mr-1 mostrarobservacionescomputacion" title="Mostrar observaciones">
    <i class="fas fa-comments text-secondary fa-2x"></i>
</a>


<a class="btn-accion-tabla tooltipsC mr-1 enviarmensaje" title="Cobrar por mensaje">
    &nbsp;<i class="fab fa-whatsapp"></i>
</a>
