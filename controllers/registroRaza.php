<?php

$especie = $_POST['especie'];

$raza = mb_strtoupper(trim($_POST['nombre']));

$datos = array('especie' => $especie, 'raza' => $raza );

include '../models/clase.php';

registroRaza($datos);

header('Location: ../especies');

?>