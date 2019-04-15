<?php

$id_mascota  = $_POST['id_mascota'];
$nombre  = trim($_POST['rNombre']);
$microchip  = trim($_POST['rMicrochip']);
$especie  = $_POST['rEspecie'];
$raza  = $_POST['rRaza'];
$sexo  = $_POST['rSexo'];
$esterilizado  = $_POST['rEsterilizado'];
$nacimiento  = $_POST['rNacimiento'];
$color  = $_POST['rColor'];
$patron  = $_POST['rPatron'];


$datos = array('id_mascota' => $id_mascota, 'nombre'=> $nombre, 'microchip' => $microchip, 'especie' => $especie, 'raza' => $raza, 'sexo' => $sexo, 'esterilizado' => $esterilizado, 'nacimiento' => $nacimiento, 'color' => $color, 'patron' => $patron);

include '../models/clase.php';

echo editarMascotas($datos);

