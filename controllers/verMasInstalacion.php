<?php

    $id_instalacion = ($_GET['id_ins'] ? $_GET['id_ins'] : $_GET['id_ins']);

    include '../models/clase.php';

    echo verMasInstalaciones($id_instalacion);