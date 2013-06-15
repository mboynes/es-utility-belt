<?php

function safe_parse_args( $args, $defaults = '' ) {
	if ( is_object( $args ) )
		$r = get_object_vars( $args );
	elseif ( is_array( $args ) )
		$r =& $args;
	else
		parse_str( $args, $r );

	if ( is_array( $defaults ) ) {
		$r = array_intersect_key( $r, $defaults );
		return array_merge( $defaults, $r );
	}
	return $r;
}

function json_excerpt( $json ) {
	if ( !$json )
		return '';
	# Get rid of whitespace
	$compressed = json_encode( json_decode( $json ) );
	if ( 'null' == $compressed )
		return $json;
	elseif ( strlen( $compressed ) > 78 )
		return substr( $compressed, 0, 75 ) . '&hellip;';
	else
		return $compressed;
}