<?php
    $cliente = $_POST['iCliente'];
    $dispositivo = $_POST['iDispositivo'];
    $serial = $_POST['serial'];
    $material = $_POST['material'];

    $datos = array('cliente' => $cliente, 'dispositivo' => $dispositivo, 'serial' => $serial, 'material' => $material);

    include '../models/clase.php';

    echo registroInstalacion($datos);