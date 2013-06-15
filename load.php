<?php

if ( !defined( 'ES_PATH' ) )
	define( 'ES_PATH', '' );

if ( !defined( 'ES_DIR' ) )
	define( 'ES_DIR', __DIR__ . '/' );

require_once ES_DIR . 'lib/ez_sql_mysql.php';
require_once ES_DIR . 'lib/curl.php';
require_once ES_DIR . 'lib/history.php';
require_once ES_DIR . 'lib/helpers.php';

global $db;

if ( defined( 'MYSQL_DB' ) && MYSQL_DB )
	$db = new ezSQL_mysql( MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB, MYSQL_HOST );
else
	$db = false;
