<?php
	// Get apache version
	function apache_version(){
		if (function_exists('apache_get_version')){
			if (preg_match('|Apache\/(\d+)\.(\d+)\.(\d+)|', apache_get_version(), $version)){
				return $version[1].'.'.$version[2].'.'.$version[3];
			}
		}
		elseif (isset($_SERVER['SERVER_SOFTWARE'])){
			if (preg_match('|Apache\/(\d+)\.(\d+)\.(\d+)|', $_SERVER['SERVER_SOFTWARE'], $version)){
				return $version[1].'.'.$version[2].'.'.$version[3];
			}
		}
		return '(unknown)';
	}
?><!doctype html>
<!--[if lt IE 8 ]><html lang="en" class="no-js ie ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie"><![endif]-->
<!--[if (gt IE 8)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>HoHB Dashboard</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="assets/css/mini.php?files=reset,common,form,standard,960.gs.fluid,simple-lists,block-lists,planning,table,calendars,wizard,gallery" rel="stylesheet" type="text/css">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="icon" type="image/png" href="favicon-large.png">
	<!-- Modernizr for support detection, all javascript libs are moved right above </body> for better performance -->
	<script src="assets/js/libs/modernizr.custom.min.js"></script>
</head>
<body>
	<!-- Header -->
	
	<!-- Main nav -->
	<nav id="main-nav">
		<ul class="container_12"><?php $menu->getMenu(); ?></ul>
	</nav>
	<!-- End main nav -->
	<!-- Sub nav -->
	<div id="sub-nav"><div class="container_12">
		<form id="search-form" name="search-form" method="post" action="search.php">
			<input type="text" name="s" id="s" value="" title="Zoek binnen systeem" placeholder="Zoek binnen systeem" autocomplete="off">
		</form>
	</div></div>
	<!-- End sub nav -->
	