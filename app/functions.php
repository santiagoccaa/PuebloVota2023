<?php

	function strToDate( $fecha, $format = 'd M Y' ){
		return utf8ize( str_replace( ' ', ' ', date( $format, strtotime( $fecha ) ) ) );
	};
	
	function utf8ize($d) {
		if (is_array($d)) {
			foreach ($d as $k => $v) {
				$d[$k] = utf8ize($v);
			}
		} else if (is_string($d)) {
			return utf8_encode($d);
		}
		return $d;
	};
	
	function GET( $name = null, $default = null ){
		return $name != null && isset( $_GET[ $name ] ) && !empty( $_GET[ $name ] ) ? $_GET[ $name ]: $default;
	};
	
	function POST( $name = null, $default = null ){
		return $name != null && isset( $_POST[ $name ] ) && !empty( $_POST[ $name ] ) ? $_POST[ $name ]: $default;
	};
	
	function REQUEST( $name = null, $default = null ){
		return $name != null && isset( $_REQUEST[ $name ] ) && !empty( $_REQUEST[ $name ] ) ? $_REQUEST[ $name ]: $default;
	};