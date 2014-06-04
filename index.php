<?php
//session_start();
error_reporting(E_ALL);
include_once('includes/include.php');
$_SESSION['userid'] = '1';
$_SESSION['userhash'] = 'rlykc4JxGoGu2';
//unset($_SESSION['userid']);
//unset($_SESSION['userhash']);
$db = new Mysqlidb('localhost', 'root', '', 'dashboard');
$login = new LoginDb();
$menu = new Menu();
$user = new Users();
$users = $db->get('users');

$error = false;
if (isset($_POST['login']) && !empty($_POST['login'])) {
	if($login->loginAttempt($_POST['username'],$_POST['password']) == true) {	
		echo '<meta http-equiv="refresh" content="0">';
	} else {
		echo '<meta http-equiv="refresh" content="0; url=?l=0&u='.base64_encode($_POST['username']).'">';
	}
}

if (!empty($_SESSION['userid']) && $login->checkLogin($_SESSION['userid'],$_SESSION['userhash'])) {
	include('pages/home.php');
	
} else {
	if(isset($_GET['l']) && $_GET['l'] == 0) {
		echo 'Er zijn geen gegevens gevonden met de gebruikersnaam'.base64_decode($_GET['u']).' in combinatie met het wachtwoord.';
	}
	/*
	echo '<form action="" method="post">
	<input type="text" name="username">
	<input type="password" name="password">	
	<input type="submit" value="submit" name="login">
	</form>
	';*/
   include('pages/login.php');
}
?>
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://localhost/git/dashboard/analytics/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
    g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="http://localhost/git/dashboard/analytics/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
</body>
</html>
