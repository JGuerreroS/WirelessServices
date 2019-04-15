<?php

$color = mb_strtoupper(trim($_POST['color']));

include '../models/clase.php';

echo $insert = cargarColor($color);