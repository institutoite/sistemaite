@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link href="{{asset('dist/css/zoomify.css')}}" rel="stylesheet" type="text/css">
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
    <section class="content container-fluid">
        <div class="card">
            <div class="card-body">
                <canvas id="chart-rea3" class="pie"></canvas>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.1/Chart.min.js"></script>
    
    <script>
        $(document).ready(function() {
            const cData = JSON.parse('<?php echo $data ?>');
            var barChartData = {
                labels: cData.label,
                datasets: [
                    {
                        fillColor: "rgba(250, 0, 0 ,0.3)",
                        strokeColor: "rgba(250,0,0,0.5)",
                        highlightFill: "#ee7f49",
                        highlightStroke: "#ffffff",
                        data: cData.cantidad,
                    },
                ]
            }
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
            Mycanva=document.getElementById("chart-rea3");  
            var ctx3 = document.getElementById("chart-rea3").getContext("2d");
            Mycanva.height=100;
            window.myPie = new Chart(ctx3).Bar(barChartData, options);
            $('table').on('click','.zoomify',function (e){
                
                Swal.fire({
                    title: 'Estudiante: '+ $(this).closest('tr').find('td').eq(1).text(),
                    text: 'Materia:'+$(this).closest('tr').find('td').eq(4).text(),
                    imageUrl: $(this).attr('src'),
                    imageWidth: 400,
                    imageHeight:400,
                    showCloseButton:true,
                    confirmButtonColor:'#26baa5',
                    confirmButtonText:"Aceptar",
                    
                })
            });
            $('table').on('click', '.finalizar', function(e) { 
                e.preventDefault(); 
                var id_estudiante =$(this).closest('tr').attr('id');
                var           fila=$(this).closest('tr');
		        $.ajax({
                    url : "{{url('clase/finalizar')}}",
                    data : { id :id_estudiante },
                    success : function(json) {
                            
                            fila.remove();
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                })

                                Toast.fire({
                                icon: 'success',
                                title: "Clase finalizada correctamente"
                                })
                    },
                    error : function(xhr, status) {
                        Swal.fire({
                        type: 'error',
                        title: 'Ocurrio un Error',
                        text: 'Saque una captura para mostrar al servicio Técnico!',
                        })
                    },
                });
	        });

        });
    </script>
@endsection
