<?php

session_start();
require('connect.php');
$poprzednio = $_SESSION["dobre"];
$login2 = $_SESSION["login"];
$ostatnie = "UPDATE proby SET dobre='$poprzednio' WHERE username='$login2'";
mysqli_query($conn, $ostatnie) or die(mysqli_error($conn));
session_destroy();
header('Location: index.php');

?>