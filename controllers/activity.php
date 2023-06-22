<?php
require "../models/Activity.php";

$clientId = isset($_POST["clientId"]) ? $_POST["clientId"] : "";
$invoiceId = isset($_POST["invoiceId"]) ? $_POST["invoiceId"] : "";
$itemId = isset($_POST["itemId"]) ? $_POST["itemId"] : "";
$date = isset($_POST["date"]) ? $_POST["date"] : "";
$amount = isset($_POST["amount"]) ? $_POST["amount"] : "";

$activity = new Activity();

switch (isset($_GET["op"]) ? $_GET["op"] : "") {
    case "create":
        try {
            if ($clientId === "" || $invoiceId === "" || $itemId === "" || $date === "" || $amount === "")
                throw new Exception("Se requieren todos los datos");

            $activity = $activity->create($clientId, $invoiceId, $itemId, $date, $amount);

            http_response_code(201);
            echo $activity;
        } catch (Exception $e) {
            http_response_code(400);
            echo "Error: " . $e->getMessage();
        }
        break;
    case "list":
        try {
            $activities = $activity->list();

            http_response_code(200);
            echo json_encode($activities);
        } catch (Exception $e) {
            http_response_code(400);
            echo "Error: " . $e->getMessage();
        }
        break;
    case "findbyclient":
        try {
            if ($clientId === "")
                throw new Exception("Se requieren el id del cliente");

            $activities = $activity->findByClient($clientId);

            http_response_code(200);
            echo json_encode($activities);
        } catch (Exception $e) {
            http_response_code(400);
            echo "Error: " . $e->getMessage();
        }
        break;
    default:
        break;
}
