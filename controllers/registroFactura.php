<?php
    $cliente = explode('-', $_POST['sCliente']);
    $cliente[0];
    $cliente[1];
    $referencia = $_POST['referencia'];
    $fPago = $_POST['fPago'];
    $tPago = $_POST['tPago'];

    $datos = array('cliente' => $cliente[0], 'plan' => $cliente[1], 'referencia' => $referencia, 'fechaPago' => $fPago, 'total' => $tPago);

    include '../models/clase.php';

    echo registroFactura($datos);