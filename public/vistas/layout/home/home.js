let vector_intereses = [];
$(document).ready(function () {
    $.ajax({
        url: 'interests/get',
        type: 'GET',
        success: function (json) {
            $html = "";
            $html += "<div class='table-responsive text-left ps-5'><table id='tablita' class=''><tbody><tr>";
            k = 1;
            for (let j in json.interests) {
                if (k % 4 != 0) {
                    $html += "<td class=''><div class='form-check form-switch'>";
                    $html += "<input class='form-check-input checkinterest' id=" + json.interests[j].id + " name='interests[]' type='checkbox' value=" + json.interests[j].id + ">";
                    $html += "<label class='form-check-label' for='" + json.interests[j].id + "'>" + json.interests[j].interest + "</label>";
                    $html += "</div></td>";
                }
                else {
                    $html += "<td class=''><div class='form-check form-switch'>";
                    $html += "<input class='form-check-input checkinterest' id=" + json.interests[j].id + " name='interests[]' type='checkbox' value=" + json.interests[j].id + ">";
                    $html += "<label class='form-check-label' for='" + json.interests[j].id + "'>" + json.interests[j].interest + "</label>";
                    $html += "</div></td>";
                    $html += "</tr>";
                    $html += "<tr>";
                }
                k++;
            }
            $html += "</tbody></table></div>";
            $("#interests").append($html);
        },
        error: function (xhr, ajaxOptions, thrownError) {
        }
    });

    $("#interests").on("click", '.checkinterest', function (e) {
        vector_intereses.push($(this).attr('id'));
        //console.log(vector_intereses);
    });

    $("#formulario").submit(function (event) {
        event.preventDefault();
        var formData = $('#formulario').serializeArray();
        console.log(formData);
        var token = $("input[name=_token]").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#error").empty();
        $("#error-nombre").addClass("d-none");
        $("#nombre").removeClass("is-invalid");
        $("#error-telefono").addClass("d-none");
        $("#telefono").removeClass("is-invalid");
        $("#error-comentario").addClass("d-none");
        $("#comentario").removeClass("is-invalid");
        $("#error-interests").addClass("d-none");
        $("#card-interests").removeClass("border-danger");
        jQuery.ajax({
            headers: { 'X-CSRF-TOKEN': token },
            url: "comentario/guardar",
            data: formData,
            type: "POST",
            success: function (data) {
                console.log("Datos enviados desde el controlador");
                console.log(data);
                if (data.error) {
                    if (data.error.nombre) {
                        $("#error-nombre").html(data.error.nombre);
                        $("#error-nombre").removeClass("d-none");
                        $("#nombre").addClass("is-invalid");
                    } else {
                        $("#nombre").addClass("is-valid");
                    }
                    if (data.error.telefono) {
                        $("#error-telefono").html(data.error.telefono);
                        $("#error-telefono").removeClass("d-none");
                        $("#telefono").addClass("is-invalid");
                    } else {
                        $("#telefono").addClass("is-valid");
                    }
                    if (data.error.comentario) {
                        $("#error-comentario").html(data.error.comentario);
                        $("#error-comentario").removeClass("d-none");
                        $("#comentario").addClass("is-invalid");
                    } else {
                        $("#comentario").addClass("is-valid");
                    }
                    if (data.error.interests) {
                        $("#error-interests").html(data.error.interests);
                        $("#error-interests").removeClass("d-none");
                        $("#card-interests").addClass("border-danger");
                    } else {
                        $("#card-interests").addClass("border-success");
                    }
                    if (data.error.recaptcha) {
                        $("#error-recaptcha").html(data.error.recaptcha);
                        $("#error-recaptcha").removeClass("d-none");
                        $("#card-recaptcha").addClass("border-danger");
                    } else {
                        $("#card-recaptcha").addClass("border-success");
                    }
                }
                else {
                    $("#nombre").val("");
                    $("#telefono").val("");
                    $("#comentario").val("");
                    $("input:checkbox").each(function () {
                        $(this).attr('checked', false);
                    });
                    $("#error").append("<li class='text-success'>Se envio correctamente tus datos</li>");
                    contardor = 1;
                    $msg = "Hola. mi nombre es:%0A*" + data.comentario.nombre + "*%0A y mi telefono es:%0A*" + data.comentario.telefono + "*%0A Requerimiento: %0A*" + data.comentario.comentario + "* %0AVisite su página estoy interesado en los siguientes servicios o productos:%0A";
                    $.each(data.vector_intereses, function (key, value) {
                        $msg += "*" + contardor + ".- " + value.interest + '*%0A';
                        contardor++;
                    });
                    $msg += "%0A Descargar contacto:%0A";
                    $msg += "{{URL::to('/')}}/crear/contacto/" + data.comentario.id;
                    $msg += "%0A Link del cliente:%0A";
                    $msg += "https://api.whatsapp.com/send?phone=591" + data.comentario.telefono;
                    $url = "https://api.whatsapp.com/send?phone=59171039910&text=" + $msg;
                    let a = document.createElement('a');
                    a.target = '_blank';
                    a.href = $url;
                    a.click();
                    vector_intereses = [];
                }
            }
        });
    });
});