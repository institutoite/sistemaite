<a href="{{ route('materias.edit',$id)}}" class="btn-accion-tabla tooltipsC mr-2 editar" title="Editar este interés">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{ route('materias.show',$id) }}" class="btn-accion-tabla tooltipsC mr-2 mostrar" title="Ver este interés">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar este interés">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form> 