
@if ($estado=="FINALIZADO")
    <span class="text-bold"> FINALIZADO </span> 
    <a href="" class="text-secondary ml-2 finalizado" data-toggle="tooltip" data-placement="top" title="Ver este programa"><i class="fas fa-eye"></i></a>
@endif

@if ($estado=="PRESENTE")
    <a href="" class="btn btn-warning text-primary ml-2 editar" data-toggle="tooltip" data-placement="top" title="Editar este programa"> Editar <i class="fas fa-edit"></i></a>    
@endif
@if ($estado=="INDEFINIDO")
    <a class="btn btn-primary text-white ml-2" href="{{route('marcado.presente.rapido',$id)}}" title="Marcado Rapido">Rápido <i class="fas fa-bolt"></i></a>
    <a class="btn btn-secondary text-white ml-2" href="{{route('marcado.presente.normal',$id)}}" title="Marcado Normal">Normal <i class="fas fa-bolt"></i></a>
    <a href="" class="btn btn-warning text-primary ml-2 editar" data-toggle="tooltip" data-placement="top" title="Editar este programa"> Editar <i class="fas fa-edit"></i></a>    
@endif

