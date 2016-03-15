<?php
try{
	include_once 'shared/OpenDbConnection.php';
	//Beveiliging
	if (!isset($_SESSION['login'])) {
		header('location: ../Login.php');
	}

	if (isset($_GET['id'])) {
		$stmt = $conn->prepare('DELETE FROM berichten WHERE id=:id;');
		$stmt->execute([
			'id' => $_GET['id']
		]);
	}
	header('location: ../BackOffice.php');
}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}



?>