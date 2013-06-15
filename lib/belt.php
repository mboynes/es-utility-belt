<?php

/**
 * Override the path where things are addressed, if you'd like.
 *
 * @author Matthew Boynes
 */

if ( isset( $_GET['page'] ) ) {
	$page = ES_DIR . 'pages/' . preg_replace( '/[^-_a-z0-9]/i', '', $_GET['page'] ) . '.php';
	if ( file_exists( $page ) )
		require $page;
	exit;
}
