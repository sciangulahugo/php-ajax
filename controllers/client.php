<?php
require "../models/Client.php";

$firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : "";
$lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : "";

$client = new Client();

switch (isset($_GET["op"]) ? $_GET["op"] : "") {
    case "create":
        try {
            // Creamos al usuario
            if (empty($firstName) || empty($lastName))
                throw new Exception("Nombre y Apellido requeridos");

            $response = $client->create($firstName, $lastName);
            echo $response;
        } catch (Exception $e) {
            http_response_code(400);
            echo "Error: " . $e->getMessage();
        }
        break;
    case "list":
        // Listamos todos los clientes
        $clients = $client->list();
        echo json_encode($clients);
        break;
    default:
        break;
}
