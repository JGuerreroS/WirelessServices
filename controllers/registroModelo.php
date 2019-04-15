<?php

$modelo = mb_strtoupper(trim($_POST['dispositivo']));

include '../models/clase.php';

echo cargarModelos($modelo);