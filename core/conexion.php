<?php

include 'conn.php';

// Connection variables
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
mysqli_set_charset($conn,'utf8');

// Check connection
if (!$conn) {
    die("Falla de conexión: " . mysqli_connect_error());
}

// echo 'Si hay enlace';

$fecha = date("Y-m-d h:i:s");

?>