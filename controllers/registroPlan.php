<?php

$plan = mb_strtoupper(trim($_POST['plan']));
$costo = $_POST['costoPlan'];

include '../models/clase.php';

echo cargarPlan($plan,$costo);