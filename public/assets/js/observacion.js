
    CKEDITOR.replace('editor1', {
        height: 120,
        width: "100%",
        removeButtons: 'PasteFromWord'
    });

    
    $('table').on('click', '.observacion', function (e) {
        e.preventDefault();
        let objeto_id = $(this).closest('tr').attr('id');
        $("#observable_id").val(objeto_id);
        $("#observable_type").val($(this).attr("id"));
        CKEDITOR.instances.editor1.setData('');
        $("#modal-gregar-observacion").modal("show");
    });

    /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% BOTON GUARDAR OBSERVACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
    $('#guardar-observacion').on('click', function (e) {
        e.preventDefault();
        let observable_id = $("#observable_id").val();
        let observable_type = $("#observable_type").val();
        for (instance in CKEDITOR.instances) { CKEDITOR.instances[instance].updateElement() }

        $.ajax({
            url: "guardar/observacion",
            data: {
                //obs: $("#observacionx").val(),
                observacion: $("#editor1").val(),
                observable_id: observable_id,
                observable_type: observable_type,
            },
            success: function (json) {
                $("#" + observable_id).addTempClass('bg-success', 3000);
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                })
                Toast.fire({
                    type: 'success',
                    title: "Guardado corectamente: " + json.observacion,
                })
            },
            error: function (xhr, status) {
                alert('Disculpe, existió un problema');
            },
        });
        $("#modal-gregar-observacion").modal("hide");
    });

    //** %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% editar observacion %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */

    


