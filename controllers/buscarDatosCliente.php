<?php

    $rut = ($_GET['rut'] ? $_GET['rut'] : $_GET['rut']);

    include '../models/clase.php';

    echo buscarDatosCliente($rut);