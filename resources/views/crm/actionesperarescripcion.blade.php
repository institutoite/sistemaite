
<a href="{{route('personas.editar.rapidingo', $id)}}" class="tooltipsC mr-2" title="Editar este rapidingo">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('personas.edit', $id)}}" title="Dar de alta">
    <i class="fa-solid fa-upload text-green"></i>
</a>

<a class="btn-accion-tabla tooltipsC btn-sm mr-2 observacion" id="Persona" title="Agregar Observacion">
    <i class="fas fa-comment-alt"></i>
</a>

<a href="" class="tooltipsC mr-1 mostrarobservacionespersona" title="Mostrar observaciones">
    <i class="fas fa-comments text-secondary"></i>
</a>

<a href="" class="unsuscribe" id='{{$id}}' title="Dar de baja">
    <i class="fa-solid fa-download text-danger"></i>
</a>
<a href="{{route('descargar.contacto', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Descargar contacto">
    <i class="far fa-address-card"></i>
</a>

<a class="btn-accion-tabla tooltipsC mr-1 enviarmensaje text-success" title="Enviar mensaje a su whatsapp">
    <i class="fab fa-whatsapp"></i>
</a>
<a href="" class="btn-accion-tabla tooltipsC mr-1 fechar" title="Agendar cuando piensa venir">
    <i class="fas fa-calendar-check"></i>
</a>
<a href="" class="btn-accion-tabla tooltipsC mr-1 calificar" title="Calificar el nivel de regreso 20% a 100% donde 100% es que volvera seguro">
    <i class="fas fa-thumbs-up"></i>
</a>
<a class="btn-accion-tabla tooltipsC btn-sm mr-2 mostraradministrativos" title="Delegar cliente">
    <i class="fas fa-share-alt"></i>
</a>

