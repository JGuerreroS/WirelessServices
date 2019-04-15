<?php

$id_cliente  = $_GET['id_cliente'];

include '../models/clase.php';

echo borrarClientes($id_cliente);