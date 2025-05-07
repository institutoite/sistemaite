@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Pagos Inscripciones')

@section('content')
<div class="card">
    <div class="card-header bg-secondary">
        CONSULTA CON PARÁMETROS DE FECHASx
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4"> 
                <div class="form-floating mb-3 text-gray">
                    <input type="date" name="fechaini" class="form-control texto-plomo" id="fechaini" placeholder="Fecha inicio" value="{{old('fechaini', '2022-10-01')}}">
                    <label for="fechaini">Fecha inicio</label>
                </div>
            </div>

            <div class="col-md-4"> 
                <div class="form-floating mb-3 text-gray">
                    <input type="date" name="fechafin" class="form-control texto-plomo" id="fechafin" placeholder="Fecha fin" value="{{old('fechafin', '2022-10-01')}}">
                    <label for="fechafin">Fecha fin</label>
                </div>
            </div>

            <div class="col-md-4">
                <button id="consultar" class="btn btn-primary btn-lg">Consultar</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-secondary">
        Pago de Inscripciones
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="bg-primary">
                <tr>
                    <th>ESTUDIANTE</th>
                    <th>MONTO</th>
                    <th>USUARIO</th>
                    <th>MODELO</th>
                    <th>FECHA-HORA</th>
                </tr>
            </thead>
            <tbody id="tabla-pagos">
                <!-- Filas dinámicas -->
            </tbody>
            <tfoot class="bg-primary">
                <tr>
                    <td colspan="1" class="text-end fw-bold">Total:</td>
                    <td id="total" class="fw-bold"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('dist/js/moment.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script>
    function redondearAlSiguientePrecio(monto) {
        const precios = [40, 180, 280, 450, 780, 1050];
        // Si el monto es menor o igual al mínimo, retornamos 40
        if (monto <= precios[0]) {
            return precios[0];
        }
        
        // Si el monto es mayor que el máximo, retornamos el máximo (o podrías manejarlo de otra forma)
        if (monto > precios[precios.length - 1]) {
            return precios[precios.length - 1]; // o podrías retornar el monto sin cambios
        }
        
        // Buscamos el primer precio que sea mayor o igual al monto
        for (let i = 0; i < precios.length; i++) {
            if (precios[i] >= monto) {
                return precios[i];
            }
        }
        
        // Si no se encuentra (caso improbable), retornamos el máximo
        return precios[precios.length - 1];
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Configurar fechas por defecto
        document.getElementById('fechaini').value = moment().format('YYYY-MM-DD');
        document.getElementById('fechafin').value = moment().format('YYYY-MM-DD');

        document.getElementById('consultar').addEventListener('click', function() {
            const fechaini = document.getElementById('fechaini').value;
            const fechafin = document.getElementById('fechafin').value;

            // Validación de fechas
            if (fechaini > fechafin) {
                alert("La fecha de inicio no puede ser mayor que la fecha de fin.");
                return;
            }

            // Fetch para obtener datos
            fetch(`../../../pagoinscripciones/max/bnc`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ fechaini, fechafin })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                const tablaPagos = document.getElementById('tabla-pagos');
                const total = document.getElementById('total');

                // Limpiar la tabla
                tablaPagos.innerHTML = '';

                // Procesar datos recibidos
                let sumaTotal = 0;
                
                data.pagos.forEach(pago => {
                    const montoRedondeado = redondearAlSiguientePrecio(parseFloat(pago.monto));
                    const row = `
                        <tr>
                            <td>${pago.estudiante_codigo} ${pago.estudiante_nombre} ${pago.estudiante_apellido_paterno} ${pago.estudiante_apellido_materno}</td>
                            <td>${montoRedondeado.toFixed(0)}</td>
                            <td>${pago.usuario}</td>
                            <td>${pago.pagable_type.split("\\").pop()}</td>
                            <td>${new Date(pago.created_at).toLocaleString()}</td>
                        </tr>`;
                    tablaPagos.insertAdjacentHTML('beforeend', row);
                    sumaTotal += montoRedondeado;
                });

                // Actualizar el total
                total.textContent = `Bs. ${sumaTotal.toFixed(2)}`;
            })
            .catch(error => {
                console.error('Error:', error);
                alert("Ocurrió un error al consultar los datos. Inténtelo nuevamente.");
            });
        });
    });
</script>
@endsection
