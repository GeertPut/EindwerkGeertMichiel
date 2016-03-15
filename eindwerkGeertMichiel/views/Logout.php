<?php
	include_once 'database/shared/OpenDbConnection.php';

	if (isset($_SESSION['login'])){
		unset($_SESSION['login']);
	}
	header('location: home.php');
?>