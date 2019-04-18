<?php

$id_plan = $_GET['id_plan'];
$plan = mb_strtoupper($_GET['plan']);

include '../models/clase.php';

echo editarPlanes($id_plan,$plan);