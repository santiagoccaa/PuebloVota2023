<?php

function DB(){
	return new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
};

function login( $username, $password ){
	$result = [ 'success' => false ];
	if( $username != null && $password != null ){
		$db = DB();
		try{
			$password = sha1($password);
			$stmt = $db->prepare("SELECT * FROM `usuarios` WHERE (`username` = ? AND BINARY `password` = ?) LIMIT 1");
			$stmt->bind_param('ss', $username, $password );
			$stmt->execute();
			$temp = $stmt->get_result();
			if( $temp->num_rows > 0 ){
				$result['success'] = true;
				$row = $temp->fetch_assoc();
				if( !isset($_SESSION) ){
					session_start();
				}
				
				$_SESSION['admin'] = $row;
				$_SESSION['nombre'] = $row['id_postulado'];
				$_SESSION['consejal'] = $row['aliado'];
				$_SESSION['tipo'] = $row['tipo'];

			}
			$stmt->close();
		}catch(exception $ex){}
		$db->close();
	}
	if( !$result['success'] ){
		$result['error'] = 'El Usuario y/o Contraseña estan mal';
	}
	return $result;
};

function logout(){
	$result = [ 'success' => false ];
	if( !isset($_SESSION) ){
		session_start();
	}
	try{
		session_destroy();
		$result['success'] = true;
	}catch(exception $ex){}
	return $result;
};

