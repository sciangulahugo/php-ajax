<?php

require "../models/Client.php";

// // var_dump($_SERVER['REQUEST_METHOD']);

// switch ($_SERVER['REQUEST_METHOD']) {
//     case 'GET':
//         return listarCliente();
//     case 'POST':
//         return crearCliente();
//     default:
//         http_response_code(400);
//         header('Content-Type: application/json');
//         echo (json_encode(["message" => "Bad Request"]));
//         break;
// }

// function listarCliente()
// {
//     $client = new Client();
//     $response = $client->list();
//     header('Content-Type: application/json');
//     http_response_code(200);
//     echo json_encode($response);
// }

// function crearCliente()
// {
//     try {
//         // Tomar del body, los datos
//         $firstName = $_POST["firstName"] ?? "";
//         $lastName = $_POST["lastName"] ?? "";
//         var_dump($_REQUEST);
//         return;
//         if (empty($firstName) || empty($lastName)) {
//             throw new Exception("lastName and firstName required");
//         }


//         $client = new Client();
//         // $client->create();
//     } catch (Exception $e) {
//         header('Content-Type: application/json');
//         http_response_code(400);
//         echo json_encode(["message" => $e->getMessage()]);
//     }
// }



// die();

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
