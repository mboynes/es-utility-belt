<?php

function get_request_history( $start = 0, $limit = 10 ) {
	global $db;
	if ( ! $db )
		return '<p style="margin:20px">History database not configured</p>';

	$latest = $db->get_results( sprintf( "SELECT * FROM `requests` ORDER BY `created` DESC LIMIT %d, %d", $start, $limit ) );
	if ( !$latest )
		return;

	$js = array();
	ob_start();
	?>
	<ul class="nav nav-list">
  		<li class="nav-header">Latest Requests</li>
	  	<?php
	  	foreach ( $latest as $request ) :
	  		$js[ $request->id ] = $request;
		  	?>
			<li>
				<a class="history" href="#" data-id="<?php echo $request->id ?>">
					<?php echo $request->method ?> <?php echo $request->url ?><br />
					&nbsp; &nbsp; &nbsp; &nbsp; <?php echo json_excerpt( $request->body ) ?>
				</a>
			</li>
		<?php endforeach ?>
	</ul>
	<script type="text/javascript">
		var req_history = <?php echo json_encode( $js ) ?>;
	</script>
	<?php
	$ret = ob_get_contents();
	ob_end_clean();
	return $ret;
}


function save_request( $args = array() ) {
	global $db;
	if ( ! $db )
		return;

	$args = safe_parse_args( $args, array(
		'method'   => '',
		'url'      => '',
		'body'     => '',
		'response' => ''
	) );
	$args = array_map( array( &$db, 'escape' ), $args );

	$values = '"' . implode( '","', $args ) . '"';
	$fields = '`' . implode( '`,`', array_keys( $args ) ) . '`';
	$db->query( "INSERT INTO `requests` ({$fields}) VALUES ({$values})" );
}