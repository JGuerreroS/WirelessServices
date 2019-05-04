<?php

    $nombre = mb_strtoupper(trim($_POST['cNombre']));
    $direccion = mb_strtoupper(trim($_POST['cDireccion']));
    $dispositivo = trim($_POST['cDispositivo']);
    $materiales = mb_strtoupper(trim($_POST['cMateriales']));

    $datos = array(
        'nombre' => $nombre,
        'direccion' => $direccion,
        'dispositivo' => $dispositivo,
        'materiales' => $materiales,
    );

    include '../models/clase.php';

    echo cargarConvenio($datos);