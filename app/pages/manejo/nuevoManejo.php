<?php

include_once "conexion.php";

$database = Database::getInstance();
$pdo = $database->getConnection();

if(isset($_POST['btn_insertar'])){
	$id_postulado = $_SESSION['nombre'];
	$nombre   = $_POST['nombre'];
	$apellidos= $_POST['apellidos'];
	$cedula   = $_POST['cedula'];
	$barrio   = $_POST['barrio'];

	$digits = intval($cedula);
	$cantidadDigitos = strlen((string) $digits);

	if($cantidadDigitos > 3){
		error_log("Se insertaron los datos");
		try{
			$query = $pdo->prepare('INSERT INTO inscritos (nombre, apellidos, cedula, barrio, id_postulado) VALUES (:nombre, :apellidos, :cedula, :barrio, :id_postulado)');

			$query->execute([
				'nombre' => $nombre, 
				'apellidos' => $apellidos, 
				'cedula' => $cedula, 
				'barrio' => $barrio,
				'id_postulado' => $id_postulado
			]);
			$tipo = "success";
			$mensaje = "Persona registrada con exito";

		}catch(PDOException $e){
			error_log($e->getMessage());
			$tipo = "error";
			$mensaje = "Esta persona ya se encuentra registrada";
		}	
	}
}	

?>