<?php

if( isset($_POST['nombre']) &&
    isset($_POST['apellido']) &&
    isset($_POST['rut']) &&
    isset($_POST['telefono']) &&
    isset($_POST['email']) &&
    isset($_POST['direccion']) &&
    isset($_POST['plan']) &&
    isset($_POST['fechaInstalacion']) &&
    isset($_POST['fechaPagos']) &&
    isset($_POST['dispositivo'])){

    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $rut = trim($_POST['rut']);
    $tel = trim($_POST['telefono']);
    $email = trim($_POST['email']);
    $direccion = trim($_POST['direccion']);
    $plan = trim($_POST['plan']);
    $fechaI = trim($_POST['fechaInstalacion']);
    $fechaP = trim($_POST['fechaPagos']);
    $dispositivo = trim($_POST['dispositivo']);

    $datos = array(
        'nombre' => $nombre,
        'apellido' => $apellido,
        'rut' => $rut,
        'telefono' => $tel,
        'email' => $email,
        'direccion' => $direccion,
        'plan' => $plan,
        'fechaI' => $fechaI,
        'fechaP' => $fechaP,
        'dispositivo' => $dispositivo
    );

    include '../models/clase.php';

    echo cargarClientes($datos);

}else{

    echo 3;

}