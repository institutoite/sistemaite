<a class="btn-accion-tabla tooltipsC mr-2 editar" title="Editar este interés">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="" class="btn-accion-tabla tooltipsC mr-2 mostrar" title="Ver este interés">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<a class="btn-accion-tabla tooltipsC btn-sm mr-2 observacion" id="Interest" title="Agregar Observacion">
    <i class="fas fa-comment-alt"></i>
</a>

<a href="" class="btn-accion-tabla tooltipsC mr-1 mostrarobservacionesintereses" title="Mostrar observaciones">
    <i class="fas fa-comments text-secondary"></i>
</a>


<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminargenerico" title="Eliminar este interés">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form> 

