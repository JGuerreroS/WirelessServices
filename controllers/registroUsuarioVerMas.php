<?php

$usuario = ($_GET['usuario'] ? $_GET['usuario'] : $_GET['usuario']);

$sql = "SELECT Name, Usuario, nivel, fecha_registro, Id FROM users
 where Id = $usuario";

include '../core/conexion.php';

$result = mysqli_query($conn, $sql);

$datos = new stdClass();

while ($ver = mysqli_fetch_array($result)){

    $datos->Nombre=$ver[0];
    $datos->Usuario=$ver[1];
    $datos->Nivel=$ver[2];
    $datos->Fecha=$ver[3];
    $datos->IdUsuario=$ver[4];

}

echo json_encode($datos);