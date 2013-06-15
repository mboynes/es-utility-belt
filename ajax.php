<?php

header( "Content-Type: application/json" );

if ( defined( 'E_DEPRECATED' ) )
	error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT );
else
	error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

@include_once __DIR__ . '/config.php';
require_once __DIR__ . '/load.php';

$response = array();

if ( isset( $_POST['type'] ) ) {
	if ( 'basic' == $_POST['type'] ) {
		# Home module (run arbitrary elasticsearch queries)
		$response['body'] = htmlentities( curl_request( $_POST['url'], $_POST['method'], isset( $_POST['body'] ) ? $_POST['body'] : null ) );

		save_request( array_merge( $_POST, array( 'response' => $response['body'] ) ) );

		$response['request_history'] = get_request_history();
	}
}

echo json_encode( $response );