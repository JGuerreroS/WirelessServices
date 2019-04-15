<?php

$obtencion = mb_strtoupper(trim($_POST['obtencion']));

include '../models/clase.php';

echo $insert = cargarObtencion($obtencion);