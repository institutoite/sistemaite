<a  class="btn-accion-tabla tooltipsC btn-sm mr-2 editarpago" title="Editar este periodo">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>
<a href="" class="tooltipsC mr-2 observacion" id="Pago" title="Agregar Observacion">
    <i class="fas fa-comment-alt"></i>
</a>
<a href="" class="tooltipsC mr-1 mostrarobservacionespago" title="Mostrar observaciones">
    <i class="fas fa-comments text-secondary"></i>
</a>
<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" type="submit" class="btn eliminarpago" title="Eliminar este periodo">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form> 





