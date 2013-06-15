<?php

function curl_request( $url, $method = 'GET', $body = null ) {

	$method = strtoupper( $method );

	//open connection
	$conn = curl_init();


	if ( false === strpos( $url, '?' ) )
		$url .= '?pretty';
	else
		$url .= '&pretty';

	//set the url, number of POST vars, POST data
	curl_setopt( $conn, CURLOPT_URL, $url );
	curl_setopt( $conn, CURLOPT_TIMEOUT, 300 );
	curl_setopt( $conn, CURLOPT_FORBID_REUSE, 0 );
	curl_setopt( $conn, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $conn, CURLOPT_CUSTOMREQUEST, $method );

	if ( $body )
		curl_setopt( $conn, CURLOPT_POSTFIELDS, $body );

	//execute post
	$response = curl_exec( $conn );

	if ( false === $response ) {
		/**
		 * cUrl error code reference can be found here:
		 * http://curl.haxx.se/libcurl/c/libcurl-errors.html
		 */
		$errno = curl_errno( $conn );
		switch ( $errno ) {
			case CURLE_UNSUPPORTED_PROTOCOL:
				$error = "Unsupported protocol";
				break;
			case CURLE_FAILED_INIT:
				$error = "Internal cUrl error?";
				break;
			case CURLE_URL_MALFORMAT:
				$error = "Malformed URL [$url] -d " . $body;
				break;
			case CURLE_COULDNT_RESOLVE_PROXY:
				$error = "Couldnt resolve proxy";
				break;
			case CURLE_COULDNT_RESOLVE_HOST:
				$error = "Couldnt resolve host";
				break;
			case CURLE_COULDNT_CONNECT:
				$error = "Couldnt connect to host, Elasticsearch down?";
				break;
			case CURLE_OPERATION_TIMEDOUT:
				$error = "Operation timed out";
				break;
			default:
				$error = "Unknown error";
				if ($errno == 0)
					$error .= ". Non-cUrl error";
				break;
		}
		$response = "{\n\t\"error\" : $errno,\n\t\"message\" : \"$error\"\n}";
	}

	//close connection
	curl_close( $conn );

	return $response;
}