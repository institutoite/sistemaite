<a href="{{route('personas.edit', $id)}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Editar esta persona">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('personas.show', $id)}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Ver esta persona">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<form action=""  class="d-inline formulario eliminar">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar esta persona">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form> 

<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Disabled tooltip">
    <a href="{{route('opcion.principal', App\Models\Persona::findOrFail($id)->estudiante->id)}}" class="btn btn-primary text-white tooltipsC btn-sm mr-2" title="ir a opciones de matematicas">
        <i class="fas fa-bars"></i>
    </a>
</span>

{{-- hay que enviar el estudiante no la persona
<a href="{{route('inscripciones.vigentes', $id)}}" class="btn btn-secondary tooltipsC btn-sm mr-2" title="ir a inscripciones de matematicas">
    <i class="fas fa-square-root-alt"></i>
</a> 
<a href="{{route('inscripciones.vigentes', $id)}}" class="btn btn-danger tooltipsC btn-sm mr-2" title="ir a inscripciones de computación">
    <i class="fas fa-tv"></i>
</a>  --}}





