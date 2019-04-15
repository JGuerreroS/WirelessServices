<?php

$plan = mb_strtoupper(trim($_POST['plan']));

include '../models/clase.php';

echo cargarPlan($plan);