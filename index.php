<?php

if ( defined( 'E_DEPRECATED' ) )
	error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT );
else
	error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

@include_once __DIR__ . '/config.php';
require_once __DIR__ . '/load.php';

require_once ES_DIR . 'lib/belt.php';
require_once ES_DIR . 'lib/templates.php';

get_header();

require_once ES_DIR . 'pages/home.php';

get_footer();

