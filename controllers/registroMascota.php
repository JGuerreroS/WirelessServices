<?php
if( isset($_POST['micro']) &&
    isset($_POST['nombre']) &&
    isset($_POST['especie']) &&
    isset($_POST['sexo']) &&
    isset($_POST['nacimiento']) &&
    isset($_POST['raza']) &&
    isset($_POST['color']) &&
    isset($_POST['patron']) &&
    isset($_POST['opcion']) &&
    isset($_POST['razon']) &&
    isset($_POST['modo']) &&
    isset($_POST['dueno'])

){
    $micro = $_POST['micro'];

    $certificado = $micro.$_FILES['certificado']['name']; // asignamos al nombre del archivo el microchip tambien
    $certificadoTipo = $_FILES['certificado']['type'];
    $certificadoSize = $_FILES['certificado']['size'];

    $calidad = $micro.$_FILES['calidad']['name']; // asignamos al nombre del archivo el microchip tambien
    $calidadTipo = $_FILES['calidad']['type'];
    $calidadSize = $_FILES['calidad']['size'];

    if($certificadoSize <= 2000000 && $certificadoTipo == "application/pdf"){

        if($calidadSize <= 2000000 && $calidadTipo == "application/pdf"){

            $carpetaC = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/trabajoExtra/Mascotas/uploads/certificados/';

            move_uploaded_file($_FILES['certificado']['tmp_name'],$carpetaC.$certificado);

            $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/trabajoExtra/Mascotas/uploads/calidad/';

            move_uploaded_file($_FILES['calidad']['tmp_name'],$carpeta.$calidad);

            $nombre = $_POST['nombre'];

            $especie = $_POST['especie'];

            $sexo = $_POST['sexo'];

            $nacimiento = $_POST['nacimiento'];

            $raza = $_POST['raza'];

            $color = $_POST['color'];

            $patron = $_POST['patron'];

            $dueno = $_POST['dueno'];

            $opcion = $_POST['opcion']; // esterilizado

            $razon = $_POST['razon'];

            $modo = $_POST['modo'];

            session_start();

            $datos = array(
                'micro' => $micro,
                'nombre' => $nombre,
                'especie' => $especie,
                'sexo' => $sexo,
                'nacimiento' => $nacimiento,
                'raza' => $raza,
                'color' => $color,
                'patron' => $patron,
                'dueno' => $dueno,
                'opcion' => $opcion,
                'razon' => $razon,
                'modo' => $modo,
                'certificado' => $certificado,
                'calidad' => $calidad,
                'usuario' => $_SESSION['usuario']);

            include '../models/clase.php';

            echo $registro = registrarMascota($datos);

        }else{

            echo 3;

        }

    }else{

        echo 4;

    }

}else{

    echo 5;
    
}