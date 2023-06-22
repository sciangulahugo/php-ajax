<?php
// Obtenemos el path actual
$currentFile = $_SERVER["PHP_SELF"];
$path = basename($currentFile, ".php");

?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <header>
        <!-- Nav tabs -->
        <nav class="nav bg-light nav-tabs justify-content-center mt-2">
            <a href="./dashboard.php" class="nav-link <?= $path === "dashboard" ? "active" : ""; ?>">Inicio</a>
            <a href="./client.php" class="nav-link <?= $path === "client" ? "active" : ""; ?>">Clientes</a>
            <a href="./activity.php" class="nav-link <?= $path === "activity" ? "active" : ""; ?>">Actividades</a>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="toast position-fixed top-0 end-0 m-4" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        Cliente creado correctamente!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>