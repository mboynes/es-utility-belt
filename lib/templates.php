<?php

/**
 * Templates
 *
 * @author Matthew Boynes
 */

function get_header( $title = 'Elasticsearch Utility Belt' ) {
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="favicon.png" />
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/css/bootstrap-combined.min.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<style type="text/css" media="screen">
		body { padding-top: 60px; }
		@media (max-width:979px) { body { padding-top: 0; } }
		code { color: black; }
		.caret-up { border-top: 0; border-bottom: 4px solid #000000; }
	</style>
	<script type="text/javascript">var PATH = '<?php echo ES_PATH ?>';</script>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Elasticsearch Utility Belt</a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="active"><a href="#home">Home</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>

	<div id="wrapper" class="container">
		<h1 class="page-header">Hello, Elasticsearch</h1>

		<div id="view_wrapper">

<?php
}


function get_footer() {
	?>

		</div> <!-- #view_wrapper  -->

		<hr>

		<footer>
			<p>You know, for testing</p>
		</footer>
	</div> <!-- #wrapper.container -->
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo ES_PATH ?>assets/application.js"></script>
</body>
</html>
<?php
}

?>