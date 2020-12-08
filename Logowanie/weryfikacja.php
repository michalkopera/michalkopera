<?php

require('connect.php');
$pin = $_GET["kod"];
$query = "SELECT * FROM users WHERE kod='$pin'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$tak = mysqli_num_rows($result);
if($tak == 1){
    mysqli_query($conn, "UPDATE users SET potwierdzenie=1 WHERE kod='$pin';") or die(mysqli_error($conn));
    echo "Gratuluje, potwierdziłeś swój email!";
    echo "<br>";
    echo "<a href='index.php'>Zaloguj</a>";
} else {
    echo "Niestety weryfikacja niepomyślna";
}


?>