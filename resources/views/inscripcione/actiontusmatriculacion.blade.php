    <a href="{{route('matriculacion.edit', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Editar esta matriculación">
        <i class="fa fa-fw fa-edit text-primary"></i>
    </a>
    <a href="{{route('pagocom.crear',$id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Realizar o ver los pagos de esta matriculación">
        <i class="fas fa-hand-holding-usd"></i>
    </a>

     <a href="{{route('matriculacion.show', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Ver esta inscripción">
        <i class="fa fa-fw fa-eye text-secondary mostrar"></i>
    </a>
   
    <a href="{{route('imprimir.programacioncom',$id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Descargar e imprimir esta matriculación">
        <i class="fas fa-print"></i>
    </a>

    <form action=""  class="d-inline formulario">
        @csrf
        @method("delete")
        <button name="btn-eliminar" id="" type="submit" class="btn eliminarmatriculacion" title="Eliminar esta matriculación">
            <i class="fa fa-fw fa-trash text-danger"></i>   
        </button>
    </form> 
    
    <a href="{{route('clases.marcadocom.general',$id)}}" class="" title="Gestionar asistencia computación">
        <i class="far fa-calendar-check"></i>
    </a>
    
    {{-- <a class="btn-accion-tabla tooltipsC btn-sm mr-2 observacion-matriculacion" title="Agregar Observacion">
        <i class="fas fa-comment-alt"></i>
    </a>
    <a href="" class="btn-accion-tabla tooltipsC mr-1 mostrarobservacionesmatriculacion" title="Mostrar observaciones">
        <i class="fas fa-comments text-secondary"></i>
    </a> --}}

    <a class="btn-accion-tabla tooltipsC btn-sm mr-2 observacion" id="Matriculacion" title="Agregar Observacion">
        <i class="fas fa-comment-alt"></i>
    </a>

    <a href="" class="btn-accion-tabla tooltipsC mr-1 mostrarobservacionesmatriculacion" title="Mostrar observaciones">
        <i class="fas fa-comments text-secondary"></i>
    </a>
    
    <a href="" class="btn-accion-tabla tooltipsC mr-1 editarnotas" title="Calificar">
        <i class="fas fa-sort-numeric-up"></i>
    </a>
    

