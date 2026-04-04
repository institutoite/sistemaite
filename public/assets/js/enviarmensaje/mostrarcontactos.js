// $(document).ready(function () {
function mostrarContactos(url, persona_id, mensaje_id, mensajePersonalizado) {
    function normalizarTextoMensaje(texto) {
        return encodeURIComponent(texto || '');
    }

    function formatearFecha(valor) {
        if (!valor) {
            return '';
        }
        if (window.moment) {
            return moment(valor).format('DD-MM-YYYY');
        }
        return valor;
    }

    function renderManual(rows, textoMensaje) {
        var $tbody = $('#contactos tbody');
        $tbody.empty();

        for (var i = 0; i < rows.length; i++) {
            var item = rows[i] || {};
            var hrefWa = 'https://api.whatsapp.com/send?phone=' + (item.telefono_wa || '') + '&text=' + textoMensaje;
            var tr = '';
            tr += '<tr' + (item.id ? ' id="' + item.id + '"' : '') + '>';
            tr += '<td>' + (i + 1) + '</td>';
            tr += '<td>' + (item.nombre || '') + '</td>';
            tr += '<td>' + (item.apellidop || '') + '</td>';
            tr += '<td>' + (item.parentesco || '') + '</td>';
            tr += '<td>' + (item.telefono || '') + '</td>';
            tr += '<td>' + formatearFecha(item.updated_at) + '</td>';
            tr += '<td><a class="cargarmensaje btn btn-primary text-white" target="_blank" href="' + hrefWa + '"><i class="fab fa-whatsapp"></i>Enviar</a></td>';
            tr += '</tr>';
            $tbody.append(tr);
        }
    }

    function renderConDataTable(rows, textoMensaje) {
        if (!$.fn.DataTable) {
            renderManual(rows, textoMensaje);
            return;
        }

        try {
            if ($.fn.dataTable.isDataTable('#contactos')) {
                $('#contactos').DataTable().destroy();
            }

            $('#contactos tbody').empty();

            $('#contactos').DataTable({
                data: rows,
                responsive: true,
                autoWidth: false,
                columns: [
                    { data: null, render: function (_, __, ___, meta) { return meta.row + 1; } },
                    { data: 'nombre', defaultContent: '' },
                    { data: 'apellidop', defaultContent: '' },
                    { data: 'parentesco', defaultContent: '' },
                    { data: 'telefono', defaultContent: '' },
                    { data: 'updated_at', defaultContent: '', render: function (d) { return formatearFecha(d); } },
                    {
                        data: null,
                        orderable: false,
                        render: function (d) {
                            var hrefWa = 'https://api.whatsapp.com/send?phone=' + (d.telefono_wa || '') + '&text=' + textoMensaje;
                            return '<a class="cargarmensaje btn btn-primary text-white" target="_blank" href="' + hrefWa + '"><i class="fab fa-whatsapp"></i>Enviar</a>';
                        }
                    }
                ],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json'
                },
                order: [[5, 'desc']]
            });
        } catch (e) {
            console.error('Fallo DataTable contactos, uso render manual:', e);
            renderManual(rows, textoMensaje);
        }
    }

    $.ajax({
        url: '../mensaje/generico',
        data: {
            mensaje_id: mensaje_id,
            persona_id: persona_id,
        },
        success: function (jsonMensaje) {
            var textoPlanoDefault = (jsonMensaje && jsonMensaje.mensaje && jsonMensaje.mensaje.mensaje) ? jsonMensaje.mensaje.mensaje : '';
            var textoPlano = (mensajePersonalizado && String(mensajePersonalizado).trim() !== '')
                ? String(mensajePersonalizado)
                : textoPlanoDefault;
            var textoMensaje = normalizarTextoMensaje(textoPlano);

            var telefonoPersonal = String((jsonMensaje && jsonMensaje.persona && jsonMensaje.persona.telefono) ? jsonMensaje.persona.telefono : '').replace(/\D+/g, '');
            if (telefonoPersonal.length === 8) {
                telefonoPersonal = '591' + telefonoPersonal;
            }

            if (telefonoPersonal) {
                $('#personal').attr('href', 'https://api.whatsapp.com/send?phone=' + telefonoPersonal + '&text=' + textoMensaje);
                $('#personal').attr('target', '_blank');
                $('#personal').text('telefono personal ' + jsonMensaje.persona.telefono);
                $('#personal').show();
            } else {
                $('#personal').hide();
            }

            $.ajax({
                url: url,
                data: {
                    persona_id: persona_id,
                    draw: 1,
                    start: 0,
                    length: 100
                },
                success: function (jsonContactos) {
                    var rows = (jsonContactos && Array.isArray(jsonContactos.data)) ? jsonContactos.data : [];
                    renderConDataTable(rows, textoMensaje);
                },
                error: function () {
                    renderManual([], textoMensaje);
                    alert('No se pudieron cargar los contactos');
                }
            });
        },
        error: function () {
            $('#personal').hide();
            renderManual([], '');
            alert('Disculpe, existio un problema al cargar el mensaje');
        },
    });
}

/*%%%%%%%%%%%%%%% FIN MOSTRAR CONTACTOS CON COMPONENTES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
