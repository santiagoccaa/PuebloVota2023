<?php

include_once "conexion.php";

$database = Database::getInstance();
$pdo = $database->getConnection();

function getInscritos() {
    global $pdo;

    $id_postulado = $_SESSION['nombre'];

    $items = [];

    try {
        $query = $pdo->prepare("SELECT * FROM inscritos WHERE id_postulado = :id_postulado");
        $query->bindParam(":id_postulado", $id_postulado);
        $query->execute();

        while ($row = $query->fetch()) {
            $item = new Personas();

            $item->nombre = $row['nombre'];
            $item->apellidos = $row['apellidos'];
            $item->cedula = $row['cedula'];
            $item->barrio = $row['barrio'];

            array_push($items, $item);
        }

        return $items;

    } catch (PDOException $e) {
        return [];
    }
}

?>
