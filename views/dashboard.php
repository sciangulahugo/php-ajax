<?php
require "./header.php";
?>
<div class="row mt-4">
    <div class="col-md-3">
        <div class="card">
            <h5 class="card-header">Clientes</h5>
            <div class="card-body">
                <h5 class="card-title">Listado de clientes</h5>
                <p class="card-text">Crea, edita y modifica los clientes</p>
                <a href="./client.php" class="btn btn-primary btn-sm">Ver clientes</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <h5 class="card-header">Actividad</h5>
            <div class="card-body">
                <h5 class="card-title">Listado de las actividades</h5>
                <p class="card-text">Crea, edita y modifica las actividades</p>
                <a href="./activity.php" class="btn btn-primary btn-sm">Ver actividades</a>
            </div>
        </div>
    </div>
</div>
<?php
require "./footer.php";
?>