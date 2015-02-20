<?php
if( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
 
class MY_Controller extends CI_Controller {
 
	public function _remap( $param ) {
	$request = $_SERVER['REQUEST_METHOD'];

	if ( preg_match( "/^(?=.*[a-zA-Z])(?=.*[0-9])/", $param ) ) {
    	$id = $param;
	} else {
    	$id = null;
	}

	switch( strtoupper( $request ) ) {
	    case 'GET':
	        $method = 'read';
	        break;
	    case 'POST':
	        $method = 'save';
	        break;
	    case 'PUT':
	        $method = 'update';
	        break;
	    case 'DELETE':
	        $method = 'remove';
	        break;
	    case 'OPTIONS':
	        $method = '_options';
	        break;
	}

	$this->$method( $id );
	}
}