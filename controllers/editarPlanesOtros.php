<?php

$id_plan = $_POST['id_planH'];

$plan = mb_strtoupper($_POST['planEditarNombre']);

$costo = $_POST['planEditarCosto'];

include '../models/clase.php';

echo editarPlanes($id_plan,$plan,$costo);