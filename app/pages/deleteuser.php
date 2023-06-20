<?php

include_once "manejo/conexion.php";

$database = Database::getInstance();
$pdo = $database->getConnection();

$owo = $url;
$args = explode('/', $owo);
$path = end($args);

$cedula = $path;

error_log($cedula);

$query = $pdo->prepare("DELETE FROM inscritos WHERE cedula= :cedula");

error_log("LISTADO: consulta completa");

try {
	$query->execute(['cedula' => $cedula]);
	error_log("sale bien");

} catch (PDOException $e) {
	error_log("sale mal");
}

?>