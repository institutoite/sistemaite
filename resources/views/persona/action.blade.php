<a href="{{route('personas.edit', $id)}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Editar esta persona">
    <i class="fa fa-fw fa-edit text-primary fa-2x"></i>
</a>

<a href="{{route('personas.show', $id)}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Ver esta persona">
    <i class="fa fa-fw fa-eye text-primary fa-2x"></i>
</a>

<form action=""  class="d-inline formulario eliminar">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar esta persona">
        <i class="fa fa-fw fa-trash text-danger fa-2x"></i>   
    </button>
</form> 

<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Disabled tooltip">
    <a href="{{route('opcion.principal', App\Models\Persona::findOrFail($id)->estudiante->id)}}" class="btn btn-primary text-white tooltipsC btn-sm mr-2" title="ir a opciones de matematicas">
        <i class="fas fa-bars fa-2x"></i>
    </a>
</span>
{{-- <a href="{{route('observacion.create', ['observable_id'=>$id,'observable_type'=> "Estudiante"])}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Ver esta persona">
    <i class="fas fa-comment-alt fa-2x"></i>
</a> --}}
<a href="" class="btn-accion-tabla tooltipsC btn-sm mr-2 observacion" title="Agregar Observacion">
    <i class="fas fa-comment-alt fa-2x"></i>
</a>
