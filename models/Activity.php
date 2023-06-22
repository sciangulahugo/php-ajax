<?php

class Activity
{
    private $counterFile = "../storage/activityCounter.txt";
    private $activityFile = "../storage/activity.txt";

    public function __construct()
    {
        // echo "class Activity";
    }

    public function getNextId()
    {
        $counter = file_get_contents($this->counterFile);
        $nextId = intval($counter) + 1;
        file_put_contents($this->counterFile, $nextId);
        return $nextId;
    }

    public function create($clientId, $invoiceId, $itemId, $date, $amount)
    {
        // Abrimos el archivo
        $file = fopen($this->activityFile, "a");

        if ($file === false) {
            $lastError = error_get_last();
            throw new Exception("Error al abrir el archivo: " . $lastError["message"]);
        }

        $activityId = $this->getNextId();

        $activity = $activityId . ";" . $clientId . ";" . $invoiceId . ";" . $itemId . ";" . $date . ";" . $amount . "\n";

        if (!fputs($file, $activity)) {
            $lastError = error_get_last();
            throw new Exception("Error al escribir el archivo: " . $lastError["message"]);
        }

        if (!fclose($file)) {
            $lastError = error_get_last();
            throw new Exception("Error al cerrar el archivo: " . $lastError["message"]);
        }
        return "Creado correctamente";
    }

    public function list()
    {
        $lines = file($this->activityFile);
        $activities = [];

        foreach ($lines as $line) {
            $data = explode(";", $line);
            $activity = [
                "id" => $data[0],
                "clientId" => $data[1],
                "invoiceId" => $data[2],
                "itemId" => $data[3],
                "date" => $data[4],
                "amount" => $data[5]
            ];
            $activities[] = $activity;
        }
        return $activities;
    }

    public function findByClient($clientId)
    {
        $lines = file($this->activityFile);
        $activities = [];

        foreach ($lines as $line) {
            $data = explode(";", $line);
            if ($clientId === $data[1]) {
                $activity = [
                    "id" => $data[0],
                    "clientId" => $data[1],
                    "invoiceId" => $data[2],
                    "itemId" => $data[3],
                    "date" => $data[4],
                    "amount" => $data[5]
                ];
                $activities[] = $activity;
            }
        }

        return $activities;
    }
}
