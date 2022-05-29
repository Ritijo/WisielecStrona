<?php

	require_once "connection.php";
	$connect = @new mysqli($host, $user, $pass, $name);
	
	if($connect->connect_error)
	{
		die("Connection Failed:" . $connection->connect_error);
	}

	$word = $_POST['word'];
	$jezyk = $_POST['jezyk'];
	$trudnosc = $_POST['dif'];
	$po = $_POST['wordafter'];
	$sql = "INSERT INTO words (word, kraj, poziom, wordcorrect)
	VALUES ('$word', '$jezyk', '$trudnosc', '$po')";
	mysqli_query($connect, $sql);
	echo "udalo sie";
?>