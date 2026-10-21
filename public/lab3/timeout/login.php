<?php
session_start();
$_SESSION['user'] = "Поліна";
$_SESSION['last_activity'] = time();
header("Location: check_session.php");
exit;
?>