@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop
<style>
    #principiantes, #intermedio, #avanzado {
  width: 150px;
  height: 100px;
  background-color: lightblue;
  margin: 20px;
  padding: 10px;
  display: inline-block;
}

#caja {
  width: 100px;
  height: 100px;
  background-color: blue;
  position: absolute;
  top: 50px;
  left: 50px;
  cursor: pointer;
}

</style>
@section('title', 'Crear Potencial')

@section('plugins.Jquery', true)
@section('plugins.Datatables', true)
@section('content')


<div id="principiantes">
  Principiantes
</div>
<div id="intermedio">
  Intermedio
</div>
<div id="avanzado">
  Avanzado
</div>
<div id="cajita" draggable="true">
  Arrastramexx
</div>



    <div id="contenedor" class="row">
        @foreach ($potencialesinicio as $potencial)
            @if ($potencial->habilitado==2)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="card card-danger">
                        <div class="card-header">
                            {{ $potencial->nombre }}
                        </div>
                        <div class="card-body">
                            {{ $potencial->interests }}
                        </div>
                    </div>
                </div>
            @else
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    
                </div>
            @endif
            @if ($potencial->habilitado==3)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div id="caja" class="card card-green" draggable="true">
                        <div class="card-header">
                            {{ $potencial->nombre }}
                        </div>
                        <div class="card-body">
                            {{ $potencial->interests }}
                        </div>
                    </div>
                </div>
            @else
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">

                </div>
            @endif
            @if ($potencial->habilitado==4)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="card card-blue">
                        <div class="card-header">
                            {{ $potencial->nombre }}
                        </div>
                        <div class="card-body">
                            {{ $potencial->interests }}
                        </div>
                    </div>
                </div>
            @else
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">

                </div>
            @endif
        @endforeach
        
    </div>
    
@stop

@section('js')

    <script>
        
    //   $(function() {
    //     var caja = $("#caja");
        
    //     caja.on("mousedown", function(event) {
    //         var posicionInicial = caja.position();
    //         var xOffset = event.pageX - posicionInicial.left;
    //         var yOffset = event.pageY - posicionInicial.top;
            
    //         $(document).on("mousemove", function(event) {
    //         var nuevaPosicion = {
    //             left: event.pageX - xOffset,
    //             top: event.pageY - yOffset
    //         };
    //         caja.css(nuevaPosicion);
    //         });
    //     });
        
    //     $(document).on("mouseup", function() {
    //         $(document).off("mousemove");
    //     });
    // });
$(function() {
  var caja = $("#cajita");
  var principiantes = $("#principiantes");
  var intermedio = $("#intermedio");
  var avanzado = $("#avanzado");
  
  caja.on("dragstart", function(event) {
    event.originalEvent.dataTransfer.setData("text/plain", "cajita");
  });
  
  principiantes.on("dragover", function(event) {
    event.preventDefault();
  });
  
  principiantes.on("drop", function(event) {
    event.preventDefault();
    var data = event.originalEvent.dataTransfer.getData("text");
    if (data === "cajita") {
      caja.appendTo(principiantes);
      alert("Estoy en principiantes");
    }
  });
  
  intermedio.on("dragover", function(event) {
    event.preventDefault();
  });
  
  intermedio.on("drop", function(event) {
    event.preventDefault();
    var data = event.originalEvent.dataTransfer.getData("text");
    if (data === "cajita") {
      caja.appendTo(intermedio);
      alert("Estoy en intermedio");
    }
  });
  
  avanzado.on("dragover", function(event) {
    event.preventDefault();
  });
  
  avanzado.on("drop", function(event) {
    event.preventDefault();
    var data = event.originalEvent.dataTransfer.getData("text");
    if (data === "cajita") {
      caja.appendTo(avanzado);
      alert("Estoy en avanzado");
    }
  });
});

    </script>
@stop

