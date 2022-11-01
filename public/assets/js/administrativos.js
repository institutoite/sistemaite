let tablaadministrativos;
/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DATATABLE DE OBSERVACIONES DENTRO DE UNA FUNCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
function mostrarAdministrativos(comentario_id) {
    $("#administrativos").dataTable().fnDestroy();
    $men = "";
    $.ajax({
        url: 'comentario/get/' + comentario_id,
        success: function (result) {
            $un_comentario=result.comentario;
            $unos_interests=result.interests;
            $un_como=result.como.como;
            $.each($unos_interests, function (key, value) {
                $men +=(Number(key)+Number(1))+".-%20"+value.interest + "%0A";
            });
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
                "url": 'administrativos/contactar',
            },
            "createdRow": function (row, data, dataIndex) {
                $(row).attr('id', data['id']); // agrega dinamiacamente el id del row
                $mensaje = "https://api.whatsapp.com/send?phone=591" + data['telefono'] + "&text=*Nombre:*%0A" + $un_comentario.nombre.replaceAll(' ', '%20') +"%0A%0A";
                $mensaje += "*Telefono:*%0A" + $un_comentario.telefono + "%0A%0A";
                $mensaje += "*Como se enteró:*%0A" + ($un_como) + "%0A%0A";
                $mensaje += "*Comentario:*%0A" + ($un_comentario.comentario) + "%0A%0A";
                $mensaje += "*Tipo cliente:*%0A" + 'Comentario Web' + "%0A%0A";
                $mensaje += "*Interes%20del%20cliente:*%0A" +$men;
                $mensaje += "%0A*Descargar%20contacto:*%0A";
                $mensaje += "http://localhost/sistemaite/public/crear/contacto/" + $un_comentario.id+"%0A";
                $mensaje += "%0A*Link%20del%20cliente:*%0A";
                $mensaje += "https://api.whatsapp.com/send?phone=591" + $un_comentario.telefono;
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
