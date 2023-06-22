function init() {
    list();
    $("#form").on("submit", function (e) {
        createActivity(e);
    });
}

// Crear actividad
function createActivity(e) {
    e.preventDefault();
    const formData = new FormData($("#form")[0]);
    const loader = $("#spinnerButton");
    loader.removeClass("visually-hidden");

    setTimeout(() => {
        $.ajax({
            url: "../controllers/activity.php?op=create",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                loader.addClass("visually-hidden");
                $("#modal").modal('hide'); // Cerrar modal
                $("#form")[0].reset(); // Reiniciar form

                // Actualizar el contenido del toast con el mensaje de error
                $(".toast").removeClass("text-bg-danger");
                $(".toast").addClass("text-bg-success");
                $(".toast .toast-body").text(data);
                $(".toast").toast("show");

                list();
            },
            error: function (xhr, status, error) {
                const errorMessage = xhr.responseText; // Obtener el mensaje de error
                loader.addClass("visually-hidden");

                // Actualizar el contenido del toast con el mensaje de error
                $(".toast").removeClass("text-bg-success");
                $(".toast").addClass("text-bg-danger");
                $(".toast .toast-body").text(errorMessage);
                $(".toast").toast("show");

                // Cerramos el modal
                $("#modal").modal("hide");
            }
        });
    }, [2000]);
}

// Listar todas las actividades
function list() {
    const table = $("#table");
    const loader = $("#spinnerList");

    table.addClass("opacity-25");
    loader.removeClass("visually-hidden");

    setTimeout(() => {
        $.ajax({
            url: "../controllers/activity.php?op=list",
            type: "GET",
            success: function (data) {
                table.removeClass("opacity-25");
                table.removeClass("visually-hidden");
                loader.addClass("visually-hidden");

                const activities = JSON.parse(data);
                if (!activities.length) return;

                const tbody = $("#table tbody"); // Seleccionar la tabla
                tbody.empty(); // Limpiar antes de mostrar
                for (let i = 0; i < activities.length; i++) {
                    let activity = activities[i];
                    let row = $("<tr></tr>").appendTo(tbody);
                    $("<th scope=\"row\">" + activity.id + " </th>").appendTo(row);
                    $("<td>" + activity.invoiceId + " </td>").appendTo(row);
                    $("<td>" + activity.itemId + " </td>").appendTo(row);
                    $("<td>" + activity.date + " </td>").appendTo(row);
                    $("<td>$" + activity.amount + " </td>").appendTo(row);
                }
            },
        });
    }, [2000]);
}

init();