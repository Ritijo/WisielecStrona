<?php

	require_once "connection.php";
	$connect = @new mysqli($host, $user, $pass, $name);
	
	if($connect->connect_error)
	{
		die("Connection Failed:" . $connection->connect_error);
	}

	$PL = $_POST['PL'];
	$FR = $_POST['FR'];
	$LEVEL = $_POST['dif'];
	$CATEGORY = $_POST['category'];
	$sql = "INSERT INTO words (PL, FR, LEVEL, CATEGORY)
	VALUES ('$PL', '$FR', '$LEVEL', '$CATEGORY')";
	mysqli_query($connect, $sql);
	echo "udalo sie";
?>