<?php

if( isset($_POST['nombre']) &&
    isset($_POST['apellido']) &&
    isset($_POST['rut']) &&
    isset($_POST['direccion']) &&
    isset($_POST['plan']) &&
    isset($_POST['fechaInstalacion']) &&
    isset($_POST['fechaPagos']) &&
    isset($_POST['opcion'])){

    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $rut = trim($_POST['rut']);
    $direccion = trim($_POST['direccion']);
    $plan = trim($_POST['plan']);
    $fechaI = trim($_POST['fechaInstalacion']);
    $fechaP = trim($_POST['fechaPagos']);
    $dispositivo = trim($_POST['opcion']);

    session_start();

    $datos = array(
        'nombre' => $nombre,
        'apellido' => $apellido,
        'rut' => $rut,
        'direccion' => $direccion,
        'plan' => $plan,
        'fechaI' => $fechaI,
        'fechaP' => $fechaP,
        'dispositivo' => $dispositivo,
        'usuario' => $_SESSION['usuario']
    );

    include '../models/clase.php';

    echo cargarClientes($datos);

}else{

    echo 3;

}