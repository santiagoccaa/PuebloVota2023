<?php

include "conexion.php";

$database = Database::getInstance();
$pdo = $database->getConnection();

function diasfaltantes(){
	$hoy = date('Y-m-d');
	$fin_de_ano = date('Y') . '-10-29';
	$segundos_por_dia = 86400;
	$dias_faltantes = (strtotime($fin_de_ano) - strtotime($hoy)) / $segundos_por_dia;

	return $dias_faltantes;
}

function miEquipo() {
	$id_postulado = $_SESSION['nombre'];

	global $pdo;

	$query = $pdo->prepare("SELECT COUNT(*) as total FROM inscritos WHERE id_postulado = :id_postulado");
	$query->bindParam(':id_postulado', $id_postulado);
	$query->execute();

	$miEquipo = $query->fetch(PDO::FETCH_ASSOC);

	return $miEquipo;
}

function cantidadInscritos(){

	global $pdo;

	$query = $pdo->query('SELECT COUNT(*) as inscritos FROM inscritos');
	$query->execute();

	$cantidad_inscritos = $query->fetch(PDO::FETCH_ASSOC);

	return $cantidad_inscritos;
}

?>