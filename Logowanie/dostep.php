<?php
	session_start();
	if(isset($_SESSION["username"])){
		require('connect.php');
		$username = $_SESSION["username"];
		echo "<h2>Witaj ".$username. "!</h2>";
		echo "<br>";
		
		
		
		$query = "SELECT * FROM proby WHERE username='$username';";
		$zapytanie = mysqli_query($conn, $query);
		while($r=mysqli_fetch_assoc($zapytanie)) {
		    echo "<b>Ostatnie logowanie: </b>" .$r['dobre'];
		    echo "<br>";
	    	echo "<b>Nieudane logowanie: </b>" .$r['ostatnie'];
		}
		
		
		echo "<br><br>";
		echo "<a href='logout.php'>Wyloguj</a>";
	} else {
		header('Location: index.php');
	}

?>
	
<!DOCTYPE html>
<html>

<head>
<title>No no</title>
<meta charset="UTF-8">


</head>

<body>

	

	
</body>
</html>