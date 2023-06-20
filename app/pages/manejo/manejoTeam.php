<?php 	 

include_once "conexion.php";
$database = Database::getInstance();
$pdo = $database->getConnection();

function miEquipo() {
	$id_postulado = $_SESSION['nombre'];

	global $pdo;

	$query = $pdo->prepare("SELECT COUNT(*) as total FROM inscritos WHERE id_postulado = :id_postulado");
	$query->bindParam(':id_postulado', $id_postulado);
	$query->execute();

	$miEquipo = $query->fetch(PDO::FETCH_ASSOC);

	return $miEquipo;
}

$id_consejal = $_SESSION['consejal'];

$query = $pdo->prepare("SELECT id_postulado, COUNT(*) AS cantidad FROM inscritos WHERE id_consejal = :id_consejal GROUP BY id_postulado");

$query->bindParam(':id_consejal', $id_consejal);

$query->execute();

$result = $query->fetchAll(PDO::FETCH_ASSOC);

?>