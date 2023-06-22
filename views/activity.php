<?php
// ob_start();
include "./header.php";
?>

<div class="row justify-content-center mt-4">
    <div class="d-flex flex-column flex-sm-row gap-2 justify-content-center align-items-center">
        <h1 class="h4">Listado de actividades</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal">
            Crear actividad
        </button>
    </div>
    <div class="col-md-8 mt-4 position-relative">
        <div class="table-responsive">
            <table class="table visually-hidden" id="table">
                <div class="position-absolute top-50 start-50 translate-middle">
                    <span id="spinnerList" class="spinner-border visually-hidden" role="status">
                    </span>
                </div>
                <thead>
                    <tr class="text-center">
                        <th scope="col">#Id</th>
                        <th scope="col">Factura</th>
                        <th scope="col">Artículo</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Importe</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <!-- Aca el contenido -->
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Crear actividad</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form name="form" id="form" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <span class="form-label">#Id Cliente:</span>
                        <input class="form-control" type="number" name="clientId" id="clientId" placeholder="1" required>
                    </div>
                    <div class="mb-3">
                        <span class="form-label">#Id Factura:</span>
                        <input class="form-control" type="number" name="invoiceId" id="invoiceId" placeholder="1" required>
                    </div>
                    <div class="mb-3">
                        <span class="form-label">Fecha:</span>
                        <input class="form-control" type="date" name="date" id="date" placeholder="mm/dd/yyyy" required>
                    </div>
                    <div class="mb-3">
                        <span class="form-label">Importe:</span>
                        <input class="form-control" type="number" name="amount" id="amount" placeholder="1000" required>
                    </div>
                    <div class="mb-3">
                        <span class="form-label">#Id Artículo:</span>
                        <input class="form-control" type="number" name="itemId" id="itemId" placeholder="1" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                    <button id="submit" type="submit" class="btn btn-primary btn-sm d-flex gap-2 align-items-center">
                        <span id="spinnerButton" class="spinner-border spinner-border-sm visually-hidden" role="status" aria-hidden="true"></span>
                        Crear actividad
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include "./footer.php";
?>

<script type="text/javascript" src="scripts/activity.js"></script>

<?php
// ob_end_flush();
?>