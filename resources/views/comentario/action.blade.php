

<a href="{{ route('comentario.edit', $id) }}" class="btn-accion-tabla tooltipsC mr-2 editar" title="Editar este comentario">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{ route('comentario.show',$id) }}" class="btn-accion-tabla tooltipsC mr-2 mostrar" title="Ver este comentario">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminargenerico" title="Eliminar este comentario">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form> 

<a class='btn-accion-tabla tooltipsC btn-sm mr-2 bajacomentario' title='Dar de Baja  esta comentario'>
    <i class="fas fa-arrow-down text-danger"></i>
</a>
<a class='btn-accion-tabla tooltipsC btn-sm mr-2 altacomentario' title='Dar de Alta esta comentario'>
    <i class="fas fa-arrow-up text-success"></i>
</a>
<a class='btn-accion-tabla tooltipsC btn-sm mr-2 observacion' id="Comentario" title='Agregar Observaciones'>
    <i class="fas fa-comment-medical"></i>
</a>

<a href="" class="btn-accion-tabla tooltipsC btn-sm mr-2 mostrarobservacionescomentario" title="Mostrar Observaciones">
    <i class="fas fa-comments"></i>
</a>
<a href="{{route('estudiantizar.comentario',$id)}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Mostrar Observaciones">
    <i class="fas fa-user-check"></i>
</a>

{{-- <a href="https://api.whatsapp.com/send?phone=591{{$telefono}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Mostrar Observaciones">
    <i class="fab fa-whatsapp"></i>
</a> --}}
<a class="btn-accion-tabla tooltipsC btn-sm mr-2 mostraradministrativos" title="Delegar cliente">
    <i class="fab fa-whatsapp"></i>
</a>


