<?php
	
	$action = POST('action');
	
	if( $action != null ){
		$result = [ 'success' => false ];
		
		switch( $action ){
			
			case 'login':
				$username = (string) POST('username');
				$password = (string) POST('password');
				$result   = login( $username, $password );
			break;
			
			case 'logout':
				$result = logout();
			break;
			
		}
		
		if( !$result['success'] && !isset($result['error']) ){
			$result['error'] = 'Not Action.';
		}
		
		$json = json_encode( utf8ize($result) );
		die( $json );
		
	}

?>