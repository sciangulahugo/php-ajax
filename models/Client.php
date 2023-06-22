<?php

class Client
{
    private $counterFile = "../storage/clientCounter.txt";
    private $clientsFile = "../storage/clients.txt";

    public function __construct()
    {
    }

    public function getNextId()
    {
        $counter = file_get_contents($this->counterFile);
        $nextId = intval($counter) + 1;
        file_put_contents($this->counterFile, $nextId);
        return $nextId;
    }

    // Crear cliente
    public function create($firsName, $lastName)
    {
        // Abrimos el archivo
        $file = fopen($this->clientsFile, "a");

        // En caso de error
        if ($file === false) {
            $lastError = error_get_last();
            throw new Exception("Error al abrir el archivo: " . $lastError["message"]);
        }

        $clientId = $this->getNextId();

        $client = $clientId . ";" . $firsName . ";" . $lastName . "\n";

        if (!fputs($file, $client)) {
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
        // Abrimos el archivo en modo lectura
        // $file = fopen($this->clientsFile, "r");

        // // En caso de error
        // if ($file === false) {
        //     $lastError = error_get_last();
        //     return ("Error: " . $lastError['message']);
        // }

        // $clients = [];

        // // Analizamos que no sea en fin de linea
        // while (!feof($file)) {
        //     $line = fgets(($file));
        //     $data = explode(";", $line);
        //     $client = [
        //         "id" => $data[0],
        //         "firstName" => $data[1],
        //         "lastName" => $data[2]
        //     ];
        //     $clients[] = $client;
        // }

        // Trabajamos el archivo con "file?
        $lines = file($this->clientsFile, FILE_IGNORE_NEW_LINES);
        $clients = [];

        foreach ($lines as $line) {
            $data = explode(';', $line);
            $client = [
                'id' => $data[0],
                'firstName' => $data[1],
                'lastName' => $data[2]
            ];
            $clients[] = $client;
        }
        return $clients;
    }
}
