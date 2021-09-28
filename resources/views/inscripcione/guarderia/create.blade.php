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
                // calculate total duration
                var duration = moment.duration(endTime.diff(startTime));
                // duration in hours
                var hours = parseInt(duration.asHours());
                // duration in minutes
                var minutes = parseInt(duration.asMinutes())%60;
                //alert (hours + ' hour and '+ minutes+' minutes.');
                $('#totalhoras').val(duration.asHours());

                var checkedos = $(".dias:checked").length;

                
                FechaFin=moment($('input[name=fechaini]').val()).add(1, 'months');
                FechaInicio=moment($('input[name=fechaini]').val());
                var cantidadDias=getBusinessDays(FechaFin,FechaInicio);
                
                $('#costo').val(duration.asHours()*cantidadDias*5);
                
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
        });
    </script>
@endsection
