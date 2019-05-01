<?php

$id_instalacion  = $_POST['id_instalacionB'];
$causa  = $_POST['causa'];

include '../models/clase.php';

echo borrarInstalacion($id_instalacion,$causa);