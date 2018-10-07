<?php require_once '../core/init.php'; ?>

<?php
	$_SESSION = array();
		session_destroy();
		header("Location: login.php");

?>