<?php
session_start();
unset($_SESSION['userid']);
unset($_SESSION['userhash']);
echo '<meta http-equiv="refresh" content="1; url=index.php">';
?>