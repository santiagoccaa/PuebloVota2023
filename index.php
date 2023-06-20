<?php

	error_reporting(E_ALL); 

	ini_set('ignore_repeated_errors', TRUE); 

	ini_set('display_errors', FALSE); 

	ini_set('log_errors', TRUE); 
	ini_set("error_log", "/www/votos/php-error-votos.log");
	error_log( "---------------* *****Hello, errors! * ***** ---------------------" );
	
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: *');
	header('Access-Control-Allow-Headers: *');
	
	if( !isset( $_SESSION ) ){
		session_start();
	}
	
	require_once 'app/config.php';
	require_once 'app/functions.php';
	require_once 'app/database.php';
	require_once 'app/actions.php';
	
	$url  = trim( preg_replace("/([\\|\|]+)/im", '', GET( 'url', APP_HOME ) ) );
	$args = @explode('/', $url);
	$path = @array_shift( $args );
	$file = 'app/pages/'.$path.'.php';
	$page = null;
	
	if( file_exists( $file ) && is_file( $file ) ){
		$page = $url;
	}

	if( isset($_SESSION['admin'] ) ){
		require_once 'app/app.php';
	}else{
		require_once 'app/login.php';
	}
	