   <a href="{{route('inscripciones.edit', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Editar esta inscripción">
        <i class="fa fa-fw fa-edit text-primary"></i>
    </a>
    <a href="{{route('pagos.crear',$id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Realizar o ver los pagos de esta inscripción">
        <i class="fas fa-hand-holding-usd"></i>
    </a>

    <a href="{{route('inscripciones.show', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Ver esta inscripción">
        <i class="fa fa-fw fa-eye text-secondary mostrar"></i>
    </a>
    <a href="{{route('imprimir.programa',$id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Descargar e imprimir esta inscripción">
        <i class="fas fa-print"></i>
    </a>

    <form action=""  class="d-inline formulario">
        @csrf
        @method("delete")
        <button name="btn-eliminar" id="" type="submit" class="btn eliminarinscripcion" title="Eliminar esta inscripción">
            <i class="fa fa-fw fa-trash text-danger"></i>   
        </button>
    </form> 
    
    <a href="{{route('clases.marcado.general',$id)}}" class="" title="Gestionar asistencia">
        <i class="far fa-calendar-check"></i>
    </a>

    <a class="btn-accion-tabla tooltipsC btn-sm mr-2 observacion" id="Inscripcione" title="Agregar Observacion">
        <i class="fas fa-comment-alt"></i>
    </a>

    <a href="" class="btn-accion-tabla tooltipsC mr-1 mostrarobservacionesinscripcion" title="Mostrar observaciones">
        <i class="fas fa-comments text-secondary"></i>
    </a>
