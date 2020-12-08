<!DOCTYPE html>
<html>

<head>
<title>Rejestracja</title>
<meta charset="UTF-8">
</head>

<body>

<?php

if(isset($_POST["add"])){
	
	require('connect.php');
	
	$user = $_POST["user"];
	$email = $_POST["email"];
	$name = $_POST["name"];
	$surname =  $_POST["surname"];
	$pass =  $_POST["pass"];
	$data = date('Y-m-d H:i:s');
	$kod = uniqid();

	$salt =  "xd";
	$ost = sha1($pass . $salt);

	$sql = "INSERT INTO users (username, email, imie, nazwisko, haslo, kod, data) VALUES ('$user', '$email', '$name', '$surname', '$ost', '$kod', '$data');";
	$sql .= "INSERT INTO proby (username) VALUES ('$user');";

	$temat = "Potwierdzenie";
	$tresc = "miko.sql.net.pl/zadanka/5/weryfikacja.php?kod=$kod";
	
	if(mysqli_multi_query($conn, $sql)){
		if(mail($email, $temat, $tresc));
		{
		    echo "Powierdz maila ";
		}
	} else {
		echo "Nie ma cie w bazie danych: ". $sql . "<br>". mysqli_error($conn);
	}

	
       

	mysqli_close($conn);
}

?>

<h1>Rejestracja uzytkownika</h1>
<form method="post" action="<?php $_PHP_SELF ?>">
	Nazwa Uzytkownika<br><input type="text" name="user" id="user"><br><br>
	Email<br><input type="text" name="email" id="email"><br><br>
	Imie<br><input type="text" name="name" id="name"><br><br>
	Nazwisko<br><input type="text" name="surname" id="surname"><br><br>
	Haslo<br><input type="password" name="pass" id="pass"><br><br>
	<input name="add" type="submit" id="add" value="Zarejestruj">
</form>
<br><br>
<h2>Logowanie</h2>
<form method="post" action="login.php" "logout.php">
	Nazwa Uzytkownika<br><input type="text" name="user" id="user"><br><br>
	Haslo<br><input type="password" name="pasy" id="pasy"><br><br>
	<input name="log" type="submit" id="log" value="Zaloguj">
</form>

</body>
</html>