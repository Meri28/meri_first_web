<?php
session_start();
unset ($_SESSION ['login_test']);
header ("location:login1.php");
?>

