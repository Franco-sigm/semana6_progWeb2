<?php

$servername = "localhost";
$database = "agencia_viajes";
$username = "root"; // usuario dba, en este caso root
$password = ""; 

$conn = mysqli_connect($servername, $username, $password, $database);
    
if (!$conn) {
    die("Fallo de conexión: " . mysqli_connect_error());
}
echo "";





?>