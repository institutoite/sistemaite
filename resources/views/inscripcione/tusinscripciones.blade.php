@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop
@section('title', 'Mis Inscripciones')

@section('plugins.Jquery',true)
@section('plugins.SweetAlert2',true)
@section('plugins.Datatables',true)

@section('content')
    <div class="card">
        <div class="card-header bg-primary" >
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    {{ __('Inscripciones VIGENTES de: ')}} <strong> {{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom }}</strong>
                </span>

                <div class="float-right">
                    <a href="{{ route('inscribir',$persona) }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
                    {{ __('Inscribir') }} <i class="fa fa-plus-circle text-white"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="inscripcionesVigentes" class="table table-striped table-hover">
                    <thead class="thead">
                        <tr>
                            <th>#</th>
                            <th>Objetivo</th>
                            <th>PAGO</th>
                            <th>Fecha Pago</th>
                            <th>Modalidades</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
            
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
    @if($persona->computacion)
        <div class="card"> 
            <div class="card-header bg-primary" >
                <div style="display: flex; justify-content: space-between; align-items: center;">

                    <span id="card_title">
                        {{ __('MATRICULACIOENS VIGENTES de: ')}} <strong> {{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom }}</strong>
                    </span>

                    <div class="float-right">
                        <a href="{{route('miscarreras.listar',$persona->computacion)}}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                        {{ __('Matricular') }} <i class="fa fa-plus-circle text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="matriculacionesVigentes" class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>#</th>
                                <th>Objetivo</th>
                                <th>acuenta</th>
                                <th>costo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    @include('observacion.modalcreate')
                </div>
            </div>
        </div>
        
    @endif
@endsection
@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
<script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
<script src="{{asset('dist/js/moment.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.19.0/standard-all/ckeditor.js"></script>

    <script src="{{asset('assets/js/observacion.js')}}"></script>
    
    <script>
        
    $(document).ready(function() {

        let tabla=$('#inscripcionesVigentes').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,
                    "ajax":{ 
                        "url":'../tusinscripciones',
                        "data":{
                            estudiante_id:"{{ $persona->estudiante->id }}",
                        },
                    },
                    "createdRow": function( row, data, dataIndex ) {
                    $(row).attr('id',data['id']); 
                        if (moment(data['fecha_proximo_pago']).format('YY-MM-DD')>moment().format('YY-MM-DD')){
                            $(row).addClass('text-success')
                        }else{
                            $(row).addClass('text-danger')
                        }
                        // $('td', row).eq(3).html(moment(data['fecha_proximo_pago']).format('DD-MM-YYYY'));
                            $.ajax({
                                url:"{{url('saldo/inscripcion')}}",
                                data:{inscripcion_id:data['id']},
                                success : function(json) {
                                    $('td', row).eq(2).html('<strong>Acuenta: </strong>'+json.acuenta+'<br>'+'<strong>Costo: </strong>'+json.costo+'<br><strong>Saldo: </strong>'+json.saldo);  
                                    $('td', row).eq(3).html(json.fechaHumamizado+'<br>'+moment(data['fecha_proximo_pago']).format('DD-MM-YYYY'));  
                                },
                            }); 
                    },
                    "columns": [
                        {data:'id'},
                        {data:'objetivo'},
                        {data:'costo'},
                        {data:'fecha_proximo_pago'},
                        {data:'modalidad'},
                        {
                            "name":"btn",
                            "data": 'btn',
                            "orderable": false,
                        },
                    ],
                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },
                    // "info":     false, 
                    // "searching": false,
                    "paging":   true,
                }
            );
            $('#matriculacionesVigentes').dataTable(
                {
                    "serverSide":true,
                    "responsive":true,
                    "autoWidth":false,
                    "ajax":{ 
                        "url":'../tusmatriculaciones',
                        "data":{
                            estudiante_id:"{{$persona->estudiante->id }}",
                        },
                        // "success":function (result) {
                        //     console.log(result);
                        // },
                    },
                    "columns": [
                        {data:'id'},
                        {data:'asignatura'},
                        {data:'acuenta'},
                        {data:'costo'},
                        {
                            "name":"btn",
                            "data": 'btn',
                            "orderable": false,
                        },
                    ],
                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },
                    "info":false, 
                    "searching":false,
                    "paging":true, 
                }
            );

            $('table').on('click','.eliminarinscripcion',function (e) {
                e.preventDefault(); 
                id=$(this).parent().parent().parent().find('td').first().html();
                //console.log(id);
                Swal.fire({
                    title: 'Estas seguro(a) de eliminar este registro?',
                    text: "Si eliminas el registro no lo podras recuperar jamás!",
                    icon: 'question',
                    showCancelButton: true,
                    showConfirmButton:true,
                    confirmButtonColor: '#25ff80',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar..!',
                    position:'center',        
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '../eliminar/inscripcion/'+id,
                            type: 'DELETE',
                            data:{
                                id:id,
                                _token:'{{ csrf_token() }}'
                            },
                            success: function(result) {
                                tabla.ajax.reload();
                                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                                })
                                Toast.fire({
                                icon: 'success',
                                title: 'Se eliminó correctamente el registro'
                                })   
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                switch (xhr.status) {
                                    case 500:
                                        Swal.fire({
                                            title: 'No se pudo eliminar el registro Codigo error:500',
                                            showClass: {
                                                popup: 'animate__animated animate__fadeInDown'
                                            },
                                            hideClass: {
                                                popup: 'animate__animated animate__fadeOutUp'
                                            }
                                        })
                                        break;
                                
                                    default:
                                        break;
                                }
                                
                            }
                        });
                    }else{
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 4000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'error',
                            title: 'No se eliminó el registro'
                        })
                    }
                })
            });
        } );
    </script>
@stop
