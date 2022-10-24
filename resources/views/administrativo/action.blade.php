
<a href="{{route('administrativo.editar', $admin_id)}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Editar esta persona">
    <i class="fa fa-fw fa-edit text-primary fa-2x"></i>
</a>

<a href="{{route('personas.show', $id)}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Ver esta persona">
    <i class="fa fa-fw fa-eye text-primary fa-2x"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminargenerico" title="Eliminar esta persona">
        <i class="fa fa-fw fa-trash text-danger fa-2x"></i>   
    </button>
</form> 



<a href="" class="btn-accion-tabla tooltipsC btn-sm mr-2 observacion" id="Administrativo" title="Agregar Observacion">
    <i class="fas fa-comment-alt fa-2x"></i>
</a>
<a href="" class="tooltipsC mr-1 mostrarobservacionesadministrativo" title="Mostrar observaciones">
    <i class="fas fa-comments text-secondary fa-2x"></i>
</a>
<a href="{{route("periodable.create",["periodable_id"=>$admin_id,"periodable_type"=>"Administrativo"])}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Agregar Periodo a este Administrativo">
    <i class="far fa-calendar-plus fa-2x"></i>
</a>
<a href="{{route("periodos.periodable.view",["periodable_id"=>$admin_id,"periodable_type"=>"Administrativo"])}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Agregar Periodo a este Administrativo">
    <i class="fab fa-btc fa-2x"></i>
</a>
<a href="{{route('opcion.administrativos', $id)}}" class="btn btn-primary text-white tooltipsC btn-sm mr-2" title="ir a opciones de la persona">
    Opciones
</a>

 <a class="btn-accion-tabla tooltipsC mr-1 enviarmensaje" title="Cobrar por mensaje">
    &nbsp;<i class="fab fa-whatsapp"></i>
</a>






