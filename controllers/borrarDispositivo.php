<?php

$id_modelo = $_GET['id_modelo'];

include '../models/clase.php';

echo borrarDispositivo($id_modelo);