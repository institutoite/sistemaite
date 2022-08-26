<a href="{{route('eventos.edit',$id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Editar este evento">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('eventos.show',$id)}}" class="btn-accion-tabla tooltipsC mr-2 mostrar" title="Ver este evento">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>


<button name="btn-eliminar" id="{{$id}}" class="btn eliminar" title="Eliminar este evento">
    <i class="fa fa-fw fa-trash text-danger"></i>   
</button>
