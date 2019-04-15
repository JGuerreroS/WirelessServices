<?php

$cliente = ($_GET['id_cliente'] ? $_GET['id_cliente'] : $_GET['id_cliente']);

include '../models/clase.php';

echo verDetallesClientes($cliente);