@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link href="{{asset('dist/css/zoomify.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="sweetalert2.min.css">
@endsection

@section('title', 'Estado actual')
@section('plugins.Jquery',true)
@section('plugins.Datatables',true)
@section('plugins.Sweetalert2',true)
@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop
@section('content')
{{-- {{ $data }} --}}
    <section id="contenedor" class="content container-fluid">
        
    </section>
    @include('cupos.modal')
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.1/Chart.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //crear canvas 
        //conid diferente 


        $(document).ready(function() {
            
            var options = {
                responsive: true,
                showTooltips: false,
                onAnimationComplete: function() {
                    var ctx = this.chart.ctx;
                    ctx.font = this.scale.font;
                    ctx.fillStyle = this.scale.textColor
                    ctx.textAlign = "center";
                    ctx.textBaseline = "bottom";
                    this.datasets.forEach(function(dataset) {
                        dataset.bars.forEach(function(bar) {
                            ctx.fillText(bar.value, bar.x, bar.y +3 );
                        });
                    })
                }
            };

            function pedirFecha(){
                $("#modal-pedir-fecha").modal("show");
                
            }

            $("#btn-consultar").on("click", function(e){
                e.preventDefault();
                fecha = $("#fecha").val();
                console.log(fecha);
                graficarTodos(fecha);
            });
           
             var options = {
                responsive: true,
                showTooltips: false,
                onAnimationComplete: function() {
                    var ctx = this.chart.ctx;
                    ctx.font = this.scale.font;
                    ctx.fillStyle = this.scale.textColor
                    ctx.textAlign = "center";
                    ctx.textBaseline = "bottom";
                    this.datasets.forEach(function(dataset) {
                        dataset.bars.forEach(function(bar) {
                            ctx.fillText(bar.value, bar.x, bar.y +3 );
                        });
                    })
                }
            };
            function graficar(cData,cLabel,canva_id){
                var barChartData = {
                    
                    labels: cLabel,
                    datasets:[
                        {
                            fillColor: "rgba(250, 0, 0 ,0.3)",
                            strokeColor: "rgba(250,0,0,0.5)",
                            highlightFill: "#ee7f49",
                            highlightStroke: "#ffffff",
                            data: cData,
                        },
                    ]
                }
                
                Mycanva=document.getElementById(canva_id);  
                var ctx3 = document.getElementById(canva_id).getContext("2d");
                Mycanva.height=100;
                window.myPie = new Chart(ctx3).Bar(barChartData, options);
            }
            
            function graficarTodos(fecha){
               
                $html="";
                $.ajax({
                    url: "getdata/cupos",
                    data: {
                        fecha:fecha,
                    },
                    success: function (json) {
                       
                        $html="";
                        for (let j in json.datos){
                            $html="<div class='card'>";
                            $html+="<div class='card-header'>"+json.docente[j].nombrecorto+"</div>";
                            $html+="<div class='card-body'>";
                            $html+="<canvas id='"+ "docente"+json.docente[j].id +"' class='pie'></canvas>";
                            $html+="</div>";
                            $html+="</div>";
                            $("#contenedor").append($html);
                            if(Object.keys(json.datos[j].cantidad).length-1 > 0){
                                graficar(json.datos[j].cantidad,json.datos[j].label,"docente"+json.docente[j].id);
                            }
                            $("#modal-pedir-fecha").modal('hide');
                        }
                       
                    },
                    error: function (xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
            }
             pedirFecha();
            
        
            
        
        });
    </script>
@endsection
