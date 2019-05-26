<?php

    $id_cliente  = $_POST['IperfilRut'];
    $nombre  = strtoupper($_POST['IperfilNombre']);
    $apellidos  = strtoupper($_POST['IperfilApellidos']);
    $telefono  = $_POST['IperfilTelefono'];
    $correo  = $_POST['IperfilEmail'];
    $residencia  = strtoupper($_POST['IperfilResidencia']);


    $datos = array('cliente' => $id_cliente, 'nombre'=> $nombre, 'apellidos' => $apellidos, 'telefono' => $telefono, 'correo' => $correo, 'residencia' => $residencia);

    include '../models/clase.php';

    echo editarProfile($datos);