let tablaadministrativos;
let $un_potencial;
/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DATATABLE DE OBSERVACIONES DENTRO DE UNA FUNCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
function mostrarAdministrativosPotenciales(potencial_id) {
    $("#administrativos").dataTable().fnDestroy();
    $men = "";
    $.ajax({
        // url: '../potencial/get/' + potencial_id,
        url: "{{ url('potencial/get')}}" + potencial_id,
        success: function (result) {
            $un_potencial=result.persona;
            $unos_interests=result.interests;
            $una_onservacion=result.observacion;
            $un_user=result.user;
            $un_como=result.como.como;
            $.each($unos_interests, function (key, value) {
                $men +=(Number(key)+Number(1))+".-%20"+value.interest + "%0A";
            });
            console.log($un_potencial);
        },
        error: function (xhr, ajaxOptions, thrownError) {
        }
    });
        
    tablaadministrativos = $('#administrativos').DataTable(
        {
            "serverSide": true,
            "responsive": true,
            "autoWidth": false,
            "targets": 0,
            "ajax": {
                "url":"{{url('administrativos/contactar')}}"
            },
            "createdRow": function (row, data, dataIndex) {
                $(row).attr('id', data['id']); // agrega dinamiacamente el id del row
                $mensaje = "https://api.whatsapp.com/send?phone=591" + data['telefono'] + "&text=*Nombre:*%0A" + $un_potencial.nombre.replaceAll(' ', '%20') +'%20'+ $un_potencial.apellidop.replaceAll(' ', '%20') +"%0A%0A";
                $mensaje += "*Telefono:*%0A" + $un_potencial.telefono + "%0A%0A";
                $mensaje += "*Observacion inicial:*%0A" + ($una_onservacion) + "%0A%0A";
                $mensaje += "*Tipo cliente:*%0A" + 'Potencial' + "%0A%0A";
                $mensaje += "*Quien atendió:*%0A" + $un_user + "%0A%0A";
                $mensaje += "*Interes%20del%20cliente:*%0A" +$men;
                $mensaje += "%0A*Descargar%20contacto:*%0A";
                $mensaje += "http://www.ite.com.bo/crear/contacto/" + $un_potencial.id+"%0A";
                $mensaje += "%0A*Link%20del%20cliente:*%0A";
                $mensaje += "https://api.whatsapp.com/send?phone=591" + $un_potencial.telefono;
                $mensaje += $mensaje.replace(/&nbsp[;]?/ig, '');
                $('td', row).eq(4).html("<a target='_blank' href='" + $mensaje + "'><i class='fas fa-reply-all'></i></>");
            },
            "columns": [
                { "width": "10%", data: 'id' },
                { "width": "30%", data: 'nombre' },
                { "width": "30%", data: 'apellidop' },
                { data: 'telefono' },
                {
                    "width": "25%",
                    "name": "btn",
                    "data": 'btn',
                    "orderable": false,
                },
            ],
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
            },
            "order": [[3, "desc"]]
        });
    /*%%%%%%%%%%%%%%% ENUMARA LA PRIMER COLUMNA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
    tablaadministrativos.on('order.dt search.dt', function () {
        tablaadministrativos.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
}
