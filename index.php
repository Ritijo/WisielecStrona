<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Panel Admnina</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="stylepanel.css">
</head>
<body>

        <input type="checkbox" id="nav-toggle">
        <div class="sidebar">
            <div class="sidebar-brand">
                <h2><span class="lab la-accusoft">Panel Admnina</span><span>Bonjour de France</span></h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php" class="active"><span class="las la-igloo"></span>
                    <span>Panel</span></a>
                </li>

                <li>
                    <a href=""><span class="las la-users"></span>
                    <span>Konta</span></a>
                </li>

                <li>
                    <a href="dodawanieslow.html"><span class="las la-clipboard-list"></span>
                    <span>Dodawanie słów</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h2>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here" />
            </div>

            <div class="user-wrapper">
                <img src="yturu.png" width="30px" height="30px" alt="">
                <div>
                    <h4>Pan Prezes</h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>

        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1><?php

								$host = "localhost";
								$user = "www2010_root";
								$pass = "qwerty123";
								$name = "www2010_wisielec";
								
								$connect = @new mysqli($host, $user, $pass, $name);
	
								if($connect->connect_error)
								{
									die("Connection Failed:" . $connection->connect_error);
								}
								
								$get_pleyers ="SELECT count(ID) AS SUMA FROM players
								WHERE ROLE='Uczen';";
								
								$res = mysqli_query($connect, $get_pleyers);
								
								if(mysqli_num_rows($res)>0)
								{
									while($row=mysqli_fetch_array($res))
									{
										echo $row[SUMA];
									}
								}
							?></h1>
                        <span>Uczniowie</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1><?php

								$host = "localhost";
								$user = "www2010_root";
								$pass = "qwerty123";
								$name = "www2010_wisielec";
								
								$connect = @new mysqli($host, $user, $pass, $name);
	
								if($connect->connect_error)
								{
									die("Connection Failed:" . $connection->connect_error);
								}
								
								$get_pleyers ="SELECT count(ID) AS SUMA FROM players
								WHERE ROLE='Nauczyciel';";
								
								$res = mysqli_query($connect, $get_pleyers);
								
								if(mysqli_num_rows($res)>0)
								{
									while($row=mysqli_fetch_array($res))
									{
										echo $row[SUMA];
									}
								}
							?></h1>
                        <span>Nauczyciele</span>
                    </div>
                    <div>
                        <span class="las la-book"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1><?php

								$host = "localhost";
								$user = "www2010_root";
								$pass = "qwerty123";
								$name = "www2010_wisielec";
								
								$connect = @new mysqli($host, $user, $pass, $name);
	
								if($connect->connect_error)
								{
									die("Connection Failed:" . $connection->connect_error);
								}
								
								$get_pleyers ="SELECT count(ID) AS SUMA FROM words;";
								
								$res = mysqli_query($connect, $get_pleyers);
								
								if(mysqli_num_rows($res)>0)
								{
									while($row=mysqli_fetch_array($res))
									{
										echo $row[SUMA];
									}
								}
							?></h1>
                        <span>Słowa</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single1">
                    <div>
                        <img src="flaga.svg.png" alt="">
                    </div>
                </div>
            </div>
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                       
                        
                    </div>
                </div>

                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>Uczniowie</h3>
                             <h3>Wynik </h3>
                            </span></button>
                        </div>
                        <div class="card-body">
						<?php

								$host = "localhost";
								$user = "www2010_root";
								$pass = "qwerty123";
								$name = "www2010_wisielec";
								
								$connect = @new mysqli($host, $user, $pass, $name);
	
								if($connect->connect_error)
								{
									die("Connection Failed:" . $connection->connect_error);
								}
								
								$get_pleyers ="SELECT SUM(PL_CORRECT + FR_CORRECT) as SCORE_TOTAL, name, email FROM players, Scores
								WHERE players.ID = Scores.ID_PLAYER
								GROUP by name;";
								
								$res = mysqli_query($connect, $get_pleyers);
								
								if(mysqli_num_rows($res)>0)
								{
									while($row=mysqli_fetch_array($res))
									{
										echo '<div class="customer">';
										
										echo '<div class="info">';
										echo ' <img src="kizoija.jpg" width="40px"
                                    height="40px" alt="">';
										echo "<h4>".$row[name]."</h4>";
										echo "</div>";
										echo '<div class="contact">';
										echo  $row[SCORE_TOTAL];
										echo "</div>";
										echo "</div>";
									}
								}
							?>
							
                            
                            
                            

                            


                        </div>
                </div>
            </div>
        </div>
        </main>
    </div>
</body>
</html>