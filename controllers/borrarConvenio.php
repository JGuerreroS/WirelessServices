<?php

    $id_convenio  = $_POST['id_convenioB'];
    $causa  = $_POST['causaC'];

    include '../models/clase.php';

    echo borrarConvecion($id_convenio,$causa);