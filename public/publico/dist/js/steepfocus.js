$("body").on("keydown", "input, select, textarea", function (e) {
    var self = $(this),
        form = self.parents("form:eq(0)"),
        focusable,
        next;

    // si presiono el enter
    if (e.keyCode == 13) {
        // busco el siguiente elemento
        focusable = form.find("input,a,select,button,textarea").filter(":visible");
        next = focusable.eq(focusable.index(this) + 1);

        // si existe siguiente elemento, hago foco
        if (next.length) {
            next.focus();
        } else {
            form.submit();
        }
        return false;
    }
});