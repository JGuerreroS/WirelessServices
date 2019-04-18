<?php

$id_plan = $_GET['id_plan'];

include '../models/clase.php';

echo borrarPlanes($id_plan);