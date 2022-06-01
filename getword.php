<?php

	require_once "connection.php";
	$connect = @new mysqli($host, $user, $pass, $name);
	
	if($connect->connect_error)
	{
		die("Connection Failed:" . $connection->connect_error);
	}

	$difficulty = 3;
	$nick  = 'gracz';
	$PL = 'b';
	$FR = 'a';
	$mode = 'PL';
	
	if($mode == 'PL')
	{
		$get_player_score_sql = "SELECT PL, FR FROM words, Scores, players
		WHERE LEVEL = '$difficulty' 
		and Scores.PL_CORRECT = '0'
		and players.name = '$nick'";
	}
	if($mode == 'FR')
	{
		$get_player_score_sql = "SELECT PL, FR FROM words, Scores, players 
		WHERE LEVEL = '$difficulty' 
		and Scores.FR_CORRECT = '0'
		and players.name = '$nick'";
	}	
	
	$res = mysqli_query($connect, $get_player_score_sql);
	 
	 
	if(mysqli_num_rows($res)>0)
	{
		echo "Twoj wynik: </br>";
		$row=mysqli_fetch_array($res);
		
			echo $row[PL]."</BR>";
		
			echo $row[FR];
		
	}
	



?>