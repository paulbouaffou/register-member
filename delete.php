<?php

	require 'database.php';

	$id = $_GET['id'];

	$sql = 'DELETE FROM membres WHERE id = :id';

	$statement = $connection->prepare($sql);
	$array = [':id' => $id];
	
	if ($statement->execute($array)) {

			header('Location: index.php');
		}

?>

?>