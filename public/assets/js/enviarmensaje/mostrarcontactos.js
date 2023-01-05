// $(document).ready(function () {
    function mostrarContactos(url, persona_id, mensaje_id) {
        let mensaje;
        
        $.ajax({
            url: "../mensaje/generico",
            data: {
                mensaje_id: mensaje_id,
                persona_id: persona_id,
            },
            success: function (json) {
                
                mensaje = json.mensaje;
                if (json.persona.telefono != 0) {
                    $("#personal").attr('href', 'https://api.whatsapp.com/send?phone=591' + json.persona.telefono + '&text=' + mensaje.mensaje);
                    $("#personal").attr('target', '_blank');
                    $("#personal").text('télefono personal ' + json.persona.telefono);
                    $("#personal").show().fadeIn(2000);
                } else {
                    $("#personal").hide().slideUp(2000);
                }
            },
            error: function (xhr, status) {
                alert('Disculpe, existió un problema');
            },
        });
        console.log(url+"x");
        
        $("#contactos").dataTable().fnDestroy();
        tablacontactos = $('#contactos').DataTable(
            {
                "serverSide": true,
                "responsive": true,
                "autoWidth": false,
                "targets": 0,
                "ajax": {
                    "url": url,
                    "data": {
                        persona_id: persona_id,
                    },
                },
                "createdRow": function (row, data, dataIndex) {
                    $(row).attr('id', data['id']); // agrega dinamiacamente el id del row
                    $('td', row).eq(3).html(data.pivot.parentesco);
                    $('td', row).eq(5).children('.cargarmensaje').attr('href', 'https://api.whatsapp.com/send?phone=591' + data['telefono'] + '&text=' + mensaje.mensaje);
                    $('td', row).eq(4).html(moment(data['updated_at']).format('DD-MM-YYYY'));
                    if (data['telefono'] == 0) {
                        $(row).addClass('text-danger');
                    } else {
                        $(row).addClass('text-success');
                    }
                },
                "columns": [
                    { data: 'id' },
                    { data: 'nombre' },
                    { data: 'apellidop' },
                    { data: 'telefono' },
                    { data: 'telefono' },
                    {
                        "name": "btn",
                        "data": 'btn',
                        "orderable": false,
                    },
                ],
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -1 }
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                },
                "order": [[3, "desc"]]
            });
        /*%%%%%%%%%%%%%%% ENUMARA LA PRIMER COLUMNA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        tablacontactos.on('order.dt search.dt', function () {
            tablacontactos.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    }

        /*%%%%%%%%%%%%%%% FIN MOSTRAR CONTACTOS CON COMPONENTES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/