<?php

$id_cliente = $_POST['id_cliente'];
$nombre  = trim($_POST['rNombre']);
$apellidos  = trim($_POST['rApellidos']);
$rut  = trim($_POST['rRut']);
$telefono  = trim($_POST['rTelefono']);
$email  = trim($_POST['rMail']);
$plan  = trim($_POST['rPlan']);
$dispositivo  = trim($_POST['rDispositivo']);
$direccion  = trim($_POST['rDireccion']);

$datos = array('id_cliente' => $id_cliente, 'nombre' => $nombre, 'apellidos' => $apellidos, 'rut' => $rut, 'telefono' =>$telefono, 'email' =>$email, 'plan' => $plan, 'dispositivo' => $dispositivo, 'direccion' => $direccion);

include '../models/clase.php';

echo editarClientes($datos);