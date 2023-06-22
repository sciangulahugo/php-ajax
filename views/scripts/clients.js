function init() {
    // $(document).ready(function () {
    //     // Activar el toast
    //     $(".toast").toast("show");
    // });
    // Mostramos todos los datos del archivo
    list();

    // En caso de que se envie el formulario lo creamos
    $("#form").on("submit", function (e) {
        createClient(e);
    });
}

// Crear los clientes
function createClient(e) {
    e.preventDefault();
    // Obtener valores de los campos
    const formData = new FormData($("#form")[0]);
    const loader = $("#spinnerButton");
    loader.removeClass("visually-hidden");
    // var firstName = formData.get("firstName");
    // var lastName = formData.get("lastName");

    // console.log(firstName);
    // console.log(lastName);

    // Guardamos con ajax
    setTimeout(() => {
        $.ajax({
            url: "../controllers/client.php?op=create",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,

            success: function (data) {
                // console.log(data);
                // Cerrar la ventana modal
                $("#modal").modal('hide');
                // Limpiar los campos del formulario
                $("#form")[0].reset();
                // document.getElementById("form").reset();

                // Actualizar el contenido del toast con el mensaje de error
                $(".toast").removeClass("text-bg-danger");
                $(".toast").addClass("text-bg-success");
                $(".toast .toast-body").text(data);
                $(".toast").toast("show");

                loader.addClass("visually-hidden");

                // Mostramos todos los clientes
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

// Listar clientes
function list() {
    const table = $("#table");
    const loader = $("#spinnerList");

    table.addClass("opacity-25");
    loader.removeClass("visually-hidden");

    // Hacemos una peticion de ajax
    setTimeout(() => {
        $.ajax({
            url: "../controllers/client.php?op=list",
            type: "GET",
            success: function (data) {
                table.removeClass("opacity-25");
                table.removeClass("visually-hidden");
                loader.addClass("visually-hidden");
                // Parseamos los datos
                const clients = JSON.parse(data);
                // const clients = [{
                //     id: 1,
                //     firsName: "Hugo",
                //     lastName: "Sciangula"
                // }]
                // Seleccionamos el cuerpo de la tabla
                let tbody = $("#table tbody");

                // Limpiamos antes de mostrar
                tbody.empty();

                // Insertamos los datos
                for (let i = 0; i < clients.length; i++) {
                    let client = clients[i];
                    let row = $("<tr></tr>").appendTo(tbody);
                    $("<th scope=\"row\">" + client.id + " </th>").appendTo(row);
                    $("<td>" + client.firstName + " </td>").appendTo(row);
                    $("<td>" + client.lastName + " </td>").appendTo(row);
                    $('<td><a href="#"><i class="bi bi-eye" onclick={activitiesByClient(' + client.id + ')}></i></a></td>').appendTo(row);
                }
            }
        });
    }, [2000]);
}

function activitiesByClient(id) {

    const modal = $("#modalDetail");
    modal.modal('show');
    const tableSkeleton = $("#tableSkeleton");
    const tableDetail = $("#tableDetail");

    tableSkeleton.removeClass("visually-hidden");
    tableDetail.addClass("visually-hidden");

    setTimeout(() => {
        $.ajax({
            url: "../controllers/activity.php?op=findbyclient",
            type: "POST",
            data: { clientId: id },
            success: function (data) {
                const activities = JSON.parse(data);
                tableSkeleton.addClass("visually-hidden");
                tableDetail.removeClass("visually-hidden");
                const tbody = $("#tableDetail tbody");
                tbody.empty();
                let total = 0;
                for (let i = 0; i < activities.length; i++) {
                    let activity = activities[i];
                    total += Number(activity.amount);
                    let row = $("<tr></tr>").appendTo(tbody);
                    $("<td>" + activity.date + " </td>").appendTo(row);
                    $("<td>" + activity.invoiceId + " </td>").appendTo(row);
                    $("<td>$" + activity.amount + " </td>").appendTo(row);
                }
                let row = $("<tr></tr>").appendTo(tbody);
                $("<td colspan=\"2\" class=\"text-end\">Total</td>").appendTo(row);
                $("<td>$" + total + " </td>").appendTo(row);

            }
        });
    }, [2000]);
}

init();