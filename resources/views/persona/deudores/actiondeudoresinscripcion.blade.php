
<a href="" class="tooltipsC mr-2 observacion" id="Persona" title="Agregar Observacion">
    <i class="fas fa-comment-alt"></i>
</a>
<a href="" class="tooltipsC mr-1 mostrarobservacionespersona" title="Mostrar observaciones">
    <i class="fas fa-comments text-secondary"></i>
</a>
<a href="{{route('descargar.contacto', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Descargar contacto">
    <i class="far fa-address-card"></i>
</a>
<a id="{{$inscripcione_id}}" href="" class="btn-accion-tabla tooltipsC mr-1 fechar" title="Agendar cuando va cancelar">
    <i class="fas fa-calendar-check"></i>
</a>
{{-- <a target='_blank' href='https://api.whatsapp.com/send?phone=591{{$telefono}}'><i class="fab fa-whatsapp"></i></a> --}}
<a id={{$id}} class="btn btn-primary btn-accion-tabla tooltipsC mr-1 enviarmensaje text-white" title="Cobrar por mensaje">
    Cobrar&nbsp;<i class="fab fa-whatsapp"></i>
</a>