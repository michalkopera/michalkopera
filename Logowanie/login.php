<?php

session_start();
require('connect.php');

	if(isset($_POST["user"]) and isset($_POST["pasy"])) {
		$login = $_POST["user"];
		$haslo = $_POST["pasy"];
		$salt = "xd";
		$szyfr = sha1($haslo . $salt);

		$query = "SELECT * FROM users WHERE username='$login' AND haslo='$szyfr'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $count = mysqli_num_rows($result);
		
		$ile="SELECT liczba FROM proby WHERE username='$login'";
		$rezultat = mysqli_query($conn, $ile) or die(mysqli_error($conn));
		$row = mysqli_fetch_array($rezultat);
		
		$jakdawno = "SELECT * FROM proby WHERE username='$login';";
		$pytaniee = mysqli_query($conn, $jakdawno) or die(mysqli_error($conn));
		$godzina = mysqli_fetch_assoc($pytaniee);
		$tak = $godzina['ostatnie'];
		$obecnie = date('Y-m-d H:i:s');
		$wynik = strtotime($obecnie)-strtotime($tak);
		
		$tyle = $row[0]+1;
		
		if($row[0]>9){
		    echo "Za duzo nieatoryzowanych prób. Ban na zawsze!";
		    
		} else if($row[0]==5 && $wynik<21){
		    echo "Dosyc juz tych prob, ban na 10 minut!";
		    
		} else {
		
            if($count==1){
    			$potwierdzenie="SELECT potwierdzenie FROM users WHERE username='$login'";
    		    $rezultat = mysqli_query($conn, $potwierdzenie) or die(mysqli_error($conn));
    		    $row = mysqli_fetch_array($rezultat);
    		    $czy = $row[0];
    		    
    		    if($czy==1){
    			    mysqli_query($conn, "UPDATE proby SET liczba='0' WHERE username='$login'");
    			    $_SESSION["username"] = $login;
    			    $dobre = date('Y-m-d H:i:s');
    			    $_SESSION["dobre"] = $dobre;
    			    $_SESSION["login"] = $login;
    			    echo "$odjac";
    			    header('Location: dostep.php');
    		    } else {
    		        echo "Zanim sie zalogujesz, potwierdz email!";
    		        echo "<br>";
    		        echo "<a href='index.php'>Powrót</a>";
    		    }
    		
    		} else {
    			$_POST['message'] = 'Niepoprawny ciag znakow';
    			
    		    $data = date('Y-m-d H:i:s');
    		    $dodaj = "UPDATE proby SET liczba='$tyle', ostatnie='$data' WHERE username='$login';";
    		    mysqli_query($conn, $dodaj) or die(mysqli_error($conn));
    			header('Location: index.php');
    		    }
    		    
    	
		}
		
	}

?>