<?php

$id_usuario = $_POST['id_usuario'];
$nombre  = trim($_POST['vNombre']);
$correo  = trim($_POST['vUsuario']); 
$nivel  = trim($_POST['vNivel']);

$datos = array('id_usuario' => $id_usuario, 'nombre' => $nombre, 'correo' => $correo, 'nivel' => $nivel);

include '../models/clase.php';

echo editarUsuarios($datos);