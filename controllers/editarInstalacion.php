<?php

$id_instalacion  = $_POST['vMinstalacion'];
$serial  = trim($_POST['vMserial']);
$material  = trim($_POST['vMmaterial']);

$datos = array('id_instalacion' => $id_instalacion, 'serial'=> $serial, 'material' => $material);

include '../models/clase.php';

echo editarInstalacion($datos);