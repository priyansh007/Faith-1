<?php 
	session_start();
	if (!isset($_SESSION["uid"]))
	{
		header("location: busted.php");
	}
	unset($_SESSION['uid']);
	unset($_SESSION['messman']);
	unset($_SESSION['url']);
	session_destroy();
	header("location: ../dashboard");
?>