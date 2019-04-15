<?php

$id_mascota  = $_GET['id_mascota'];

include '../models/clase.php';

echo borrarMascotas($id_mascota);