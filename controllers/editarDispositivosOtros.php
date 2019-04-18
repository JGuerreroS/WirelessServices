<?php

$id_modelo = $_GET['id_modelo'];
$modelo = mb_strtoupper($_GET['modelo']);

include '../models/clase.php';

echo editarDispositivos($id_modelo,$modelo);