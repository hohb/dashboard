<?php



	$error = false;

	





?><!doctype html>

<!--[if lt IE 8 ]><html lang="en" class="no-js ie ie7"><![endif]-->

<!--[if IE 8 ]><html lang="en" class="no-js ie"><![endif]-->

<!--[if (gt IE 8)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Login - HoHB Dashboard</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Combined stylesheets load -->
	<link href="assets/css/mini.php?files=reset,common,form,standard,special-pages" rel="stylesheet" type="text/css">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="icon" type="image/png" href="favicon-large.png">
	<!-- Modernizr for support detection, all javascript libs are moved right above </body> for better performance -->
	<script src="assets/js/libs/modernizr.custom.min.js"></script>
</head>
<!-- the 'special-page' class is only an identifier for scripts -->
<body class="special-page login-bg dark">
	<section id="login-block">
		<div class="block-border"><div class="block-content">
			<!--
			IE7 compatibility: if you want to remove the <h1>,
			add style="zoom:1" to the above .block-content div
			-->
			<h1>HoHb</h1>
			<div class="block-header">Inloggen</div>
			<?php
			if ($error)
			{
				?><p class="message error no-margin"><?php echo htmlspecialchars($error); ?></p>
			<?php
			}
			?>
            <form class="form with-margin" name="login-form" id="login-form" method="post" action="">
				<input type="hidden" name="a" id="a" value="send">
				<?php
				// Check if a redirect page has been forwarded
				if (isset($_REQUEST['redirect'])){
					?><input type="hidden" name="redirect" id="redirect" value="<?php echo htmlspecialchars($_REQUEST['redirect']); ?>">
				<?php
				}
				?><p class="inline-small-label">
					<label for="login"><span >Gebruikersnaam</span></label>
					<input type="text" name="username" id="login" class="full-width" value="<?php if (isset($_POST['username'])) { echo htmlspecialchars($_POST['username']); } ?>">
				</p>
				<p class="inline-small-label">
					<label for="pass"><span>Wachtwoord</span></label>
					<input type="password" name="password" id="pass" class="full-width" value="">
				</p>
				<button type="submit" name="login" value="submit" class="float-right">Login</button>
				<p class="input-height">
				</p>
			</form>
			
		</div></div>
	</section>
	<script src="assets/js/mini.php?files=libs/jquery-1.6.3.min,old-browsers,common,standard,jquery.tip"></script>