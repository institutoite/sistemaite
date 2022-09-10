let tablaadministrativos;
/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DATATABLE DE OBSERVACIONES DENTRO DE UNA FUNCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
function mostrarAdministrativos(comentario_id) {
    console.log(comentario_id);
    $("#administrativos").dataTable().fnDestroy();
    $men = "";
    $.ajax({
        url: 'comentario/get/' + comentario_id,
        success: function (result) {
            $un_comentario=result.comentario;
            $unos_interests=result.interests;
            $.each($unos_interests, function (key, value) {
                $men += "*" + value.interest + "*%0A";
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
                "url": 'administrativos/contactar/'+comentario_id,
            },
            "createdRow": function (row, data, dataIndex) {
                $(row).attr('id', data['id']); // agrega dinamiacamente el id del row
                $mensaje = "https://api.whatsapp.com/send?phone=591" + data['telefono'] + "&text=Nombre:%0A*"+ $un_comentario.nombre +"*%0A";
                $mensaje += "Telefono:%0A" + $un_comentario.telefono + "%0A";
                $mensaje += "Comentario:%0A" + ($un_comentario.comentario) + "%0A";
                
                // $.each($unos_interests, function (key, value) {
                //     $men +="*" + value.interest +"*%0A";
                // });
                $mensaje +=$men;
                $mensaje += "%0A%20Descargar%20contacto:%0A";
                $mensaje += "http://localhost/sistemaite/public/crear/contacto/" + $un_comentario.id+"%0A";
                $mensaje += "%0A%20Link%20del%20cliente:%0A";
                $mensaje += "https://api.whatsapp.com/send?phone=591" + $un_comentario.telefono;
                $mensaje += $mensaje.replace(/&nbsp[;]?/ig, '');
                //$mensaje.replaceAll(' ', '%20');
                console.log($mensaje);
                //$("#"+data['btn'+" "]).target("_blank");
                //$("#"+data['id']).href($mensaje);
                // hacer ajax que traiga el comentario del id leido y que lo convierta en link y se lo agrege a actiondelegar
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
                "url": "http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
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
