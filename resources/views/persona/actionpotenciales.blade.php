

<a href="{{route('personas.edit', $id)}}" title="Dar de alta">
    <i class="fa-solid fa-upload text-green"></i>
</a>
<a href="" class="ver" id='{{$id}}' title="Ver potencial">
    <i class="far fa-eye"></i>
</a>
{{-- <a href="" class="observacion" id='{{$id}}' title="Agregar observacion">
    <i class="fa-solid fa-comment-medical text-secondary"></i>
</a> --}}

<a class="btn-accion-tabla tooltipsC btn-sm mr-2 observacion" id="Persona" title="Agregar Observacion">
    <i class="fas fa-comment-alt"></i>
</a>

<a href="" class="tooltipsC mr-1 mostrarobservacionespersona" title="Mostrar observaciones">
    <i class="fas fa-comments text-secondary"></i>
</a>

<a href="" class="unsuscribe" id='{{$id}}' title="Dar de baja">
    <i class="fa-solid fa-download text-danger"></i>
</a>
{{-- <a href="{{route('imprimir.potenciales')}}" class="print" id='{{$id}}' title="Imprimir para cliente">
    <i class="fa-solid fa-print"></i>
</a> --}}

<a href="{{route('descargar.contacto', $id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Descargar contacto">
    <i class="far fa-address-card"></i>
</a>

