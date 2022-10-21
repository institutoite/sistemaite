<a href="{{route('eventos.edit',$id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Editar este evento">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('eventos.show',$id)}}" class="btn-accion-tabla tooltipsC mr-2 mostrar" title="Ver este evento">
    <i class="fa fa-fw fa-eye text-secondary"></i>
</a>

<a  class="btn-accion-tabla tooltipsC mr-2 seleccionar" title="Seleccionar este evento">
    <i class="fas fa-arrow-alt-circle-up text-primary"></i>
</a>

<a href="{{route('mensajeados.view',$id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Listar los que ya fueron mensajeados">
    <i class="fas fa-envelope-open-text text-secondary"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminargenerico" title="Eliminar esta carrera">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form> 
