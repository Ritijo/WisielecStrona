<?php

	require_once "connection.php";
	$connect = @new mysqli($host, $user, $pass, $name);
	
	if($connect->connect_error)
	{
		die("Connection Failed:" . $connection->connect_error);
	}
	
	$player_nick = '1';
	
	$get_player_score_sql = "SELECT SCORE_TOTAL FROM players WHERE ID='$player_nick';";
	
	$res = mysqli_query($connect, $get_player_score_sql);
	 
	if(mysqli_num_rows($res)>0)
	{
		echo "Twoj wynik: ";
		while($row=mysqli_fetch_array($res))
		{
			echo $row[SCORE_TOTAL];
		}
	}
	
?>