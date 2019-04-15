<?php

$mascota = ($_GET['mascota'] ? $_GET['mascota'] : $_GET['mascota']);

$sql = "SELECT id_mascota, microchip, m.nombre, m.id_especie, id_raza, sexo, fecha_nacimiento, id_color, id_patron_color, id_propietario, Name, m.fecha_registro, certificado, calidad, esterilizado FROM mascota m 

INNER JOIN clientes cl ON (m.id_propietario = cl.id) 
INNER JOIN users u ON (m.id_usuario = u.Id) where id_mascota = $mascota";

include '../core/conexion.php';

$result = mysqli_query($conn, $sql);

$datos = new stdClass();

while ($ver = mysqli_fetch_array($result)){

    $datos->idMascota=$ver[0];
    $datos->Microchip=$ver[1];
    $datos->Nombre=$ver[2];
    $datos->idEspecie=$ver[3];
    $datos->Raza=$ver[4];
    $datos->Sexo=$ver[5];
    $datos->Nacimiento=$ver[6];
    $datos->Color=$ver[7];
    $datos->Patron=$ver[8];
    $datos->Propietario=$ver[9];
    $datos->Usuario=$ver[10];
    $datos->FechaRegistro=str_replace('-', '/', date('d-m-Y', strtotime($ver[11])));
    $datos->Certificado="uploads/certificados/".$ver[12];
    $datos->Calidad="uploads/calidad/".$ver[13];
    $datos->Esterilizado=$ver[14];

}

echo json_encode($datos);