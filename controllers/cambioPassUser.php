<?php

    $actual = $_POST['passActual'];
    $nueva1  = trim($_POST['passNueva']);
    $nueva2  = trim($_POST['passNewRep']);

    if($nueva1 === $nueva2){

        $datos = array('actual' => $actual, 'nueva' => $nueva1);

        include '../models/clase.php';

        echo editarPassUser($datos); 

    }else{

        echo 3;

    }