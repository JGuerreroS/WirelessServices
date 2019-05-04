<?php

    $id_convenio = $_GET['id_convenio'];

    include '../models/clase.php';

    echo zoomConvenio($id_convenio);