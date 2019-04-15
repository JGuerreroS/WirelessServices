<?php

$patron = mb_strtoupper(trim($_POST['patron']));

include '../models/clase.php';

echo $insert = cargarPatron($patron);