@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Inscripcion Configurar')
@section('plugins.Jquery', true)

@section('content')

    <div class="pt-4">
        <div class="card">
            <div class="card-header bg-secondary">
                <span class="card-title">Formulario Inscripción</span>
            </div>
          
            <div class="card-body">
                {{-- que se diriga directo --}}
                <form method="POST" action="{{ route('inscripciones.store') }}" id="formulario" role="form" enctype="multipart/form-data">
                    @csrf
                    
                    @include('inscripcione.guarderia.form')
                    @include('include.botones')
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    
    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%% CKEDITOR --}}
        <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#objetivo' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
        {{-- %%%%%%%%%%%%%%%%%%%%%%%%%% FIN CKEDITOR --}}

    <script>


    $(document).ready(function() {
            $(".hora").change(function () {
                CalcularMonto();
            });
            $(".dias").change(function () {
                CalcularMonto();
            });
            function CalcularMonto(){
                var startTime = moment($('#horainicio').val(), "HH:mm:ss a");
                var endTime = moment($('#horafin').val(), "HH:mm:ss a");
                var FechaNacimiento = moment($('#fechanacimiento').val()).format('L');
                var edad=moment.duration(moment().diff(moment($('#fechanacimiento').val()),'years'));

                console.log("Edad: "+edad);
                // calculate total duration
                var durationXporDia = moment.duration(endTime.diff(startTime));
                // duration in hours
                // duration in minutes
                var minutes = parseInt(durationXporDia.asMinutes())%60;
                var hours = parseInt(durationXporDia.asHours())+(minutes/60);
                
                $('#totalhoras').val(durationXporDia.asHours());
                var checkedos = $(".dias:checked").length;
                FechaFin=moment($('input[name=fechaini]').val()).add(1, 'months');
                FechaInicio=moment($('input[name=fechaini]').val());
                var cantidadDias=getBusinessDays(FechaFin,FechaInicio);
                $('#horas_total').val(cantidadDias*hours);
                
                if (edad<=2){
                    var Contador=2;
                    var costoHora=15; 
                    while(Contador<hours*cantidadDias){
                        if(Contador<111){
                            costoHora=costoHora-costoHora*0.01;
                        }else{
                            costoHora=costoHora-costoHora*0.00205;
                        }
                        console.log(Contador+': '+costoHora);
                        Contador=Contador+1;
                    }
                    console.log("Cantidad Dias: "+cantidadDias);
                    console.log("Horas: "+hours);
                    console.log("Total Horas: "+hours*cantidadDias);


                    $('#costo').val(cantidadDias*hours*costoHora);
                }
                if(edad>2)
                {
                    var Contador=2;
                    var costoHora=15; 
                    while(Contador<hours*cantidadDias){
                        if(Contador<111){
                            costoHora=costoHora-costoHora*0.01;
                        }else{
                            costoHora=costoHora-costoHora*0.00205;
                        }
                        console.log(Contador+': '+costoHora);
                        Contador=Contador+1;
                    }
                    console.log("Cantidad Dias: "+cantidadDias);
                    console.log("Horas: "+hours);
                    console.log("Total Horas: "+hours*cantidadDias);


                    $('#costo').val(cantidadDias*hours*costoHora*1.22);
                    console.log(cantidadDias*hours*costoHora);
                }
                
            }
            function getBusinessDays(endDate, startDate) {
                var lastDay = moment(endDate);
                var firstDay = moment(startDate);
                let calcBusinessDays = 1 + (lastDay.diff(firstDay, 'days') * 5 -
                (firstDay.day() - lastDay.day()) * 2) / 7;
                if (lastDay.day() == 6) calcBusinessDays--;//SAT
                if (firstDay.day() == 0) calcBusinessDays--;//Sun
                return calcBusinessDays;
            }
            function FactorMultiplicador(edad, total_horas){
                if(edad>2){
                    if(total_horas<111){
                        respuesta=0.01;
                    }
                    if((total_horas>110)){
                        respuesta=0.00205;
                    }
                }
                if(edad<=2){
                    respuesta=1.22;
                }
                console.log(respuesta);
                return respuesta;
            } 
        });
    </script>
@endsection