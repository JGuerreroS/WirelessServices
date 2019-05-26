<?php

    $passActual  = trim($_POST['passActual']);
    $passNew1  = trim($_POST['passNew1']);
    $passNew2  = trim($_POST['passNew2']);

    if ($passNew1 === $passNew2){

        $datos = array($passActual, $passNew1);

        include '../models/clase.php';

        echo editarPass($datos);
        
    } else{

        echo 3;
       
    }
    

    