<a class="btn-accion-tabla tooltipsC mr-2 editar" title="Editar este tipo de archivo">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="" class="btn-accion-tabla tooltipsC mr-2 mostrar" title="Ver este tipo de archivo">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<form action=""  class="d-inline formulario eliminar">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar este tipo de archivo">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form> 