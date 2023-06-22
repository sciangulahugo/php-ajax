<?php
ob_start();
include "./header.php";
?>

<div class="row justify-content-center mt-4">
    <div class="d-flex flex-column flex-sm-row gap-2 justify-content-center align-items-center">
        <h1 class="h4">Listado de clientes</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal">
            Crear cliente
        </button>
    </div>
    <div class="col-md-8 mt-4 position-relative">
        <div class="table-responsive-xxl">
            <table class="table visually-hidden" id="table">
                <div class="position-absolute top-50 start-50 translate-middle">
                    <span id="spinnerList" class="spinner-border visually-hidden" role="status">
                    </span>
                </div>
                <thead>
                    <tr class="text-center">
                        <th scope="col">#Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Acciones</th>
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
                <h1 class="modal-title fs-5" id="modalLabel">Crear cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form name="form" id="form" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <span class="form-label">Nombre:</span>
                        <input class="form-control" type="text" name="firstName" id="firsName" placeholder="Ingresa tu nombre..." required>
                    </div>
                    <div class="mb-3">
                        <span class="form-label">Apellido:</span>
                        <input class="form-control" type="text" name="lastName" id="lastName" placeholder="Ingresa tu apellido..." required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                    <button id="submit" type="submit" class="btn btn-primary btn-sm d-flex gap-2 align-items-center">
                        <span id="spinnerButton" class="spinner-border spinner-border-sm visually-hidden" role="status" aria-hidden="true"></span>
                        Crear cliente
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Detalle del cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tabla Esqueleto -->
                <div class="table-responsive">
                    <table id="tableSkeleton" class="table placeholder-glow">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <span class="placeholder col-8 placeholder-lg"></span>
                                </th>
                                <th scope="col">
                                    <span class="placeholder col-10 placeholder-lg"></span>
                                </th>
                                <th scope="col">
                                    <span class="placeholder col-6 placeholder-lg"></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="placeholder-glow">
                                <td><span class="placeholder col-4"></span></td>
                                <td><span class="placeholder col-4"></span></td>
                                <td><span class="placeholder col-4"></span></td>
                            </tr>
                            <tr class="placeholder-glow">
                                <td><span class="placeholder col-4"></span></td>
                                <td><span class="placeholder col-4"></span></td>
                                <td><span class="placeholder col-4"></span></td>
                            </tr>
                            <tr class="placeholder-glow">
                                <td colspan="2" class="text-end"><span class="placeholder col-4"></span></td>
                                <td><span class="placeholder col-4"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Tabla Detalle -->
                <div class="table-responsive">
                    <table id="tableDetail" class="table table-bordered visually-hidden">
                        <thead>
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Nro. Factura</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<?php
include "./footer.php";
?>

<script type="text/javascript" src="scripts/clients.js"></script>

<?php
ob_end_flush();
?>