<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mascotas Graneros</title>
    <?php include 'links.php'; ?>
</head>
<body>

    <div class="container container-header">
        <div class="jumbotron">
            <!-- <h1 class="align-middle">Municipalidad Graneros</h1>
            <p>Nueva ciudad.</p> -->
        </div>
    </div>

    <div class="container">
        <?php
        if($_SESSION['nivel'] == 1){

            include 'menu.php';

        }else{

            include 'menu1.php';

        }
        ?>
        <div class="card text-letf"> <!-- Inicio de la tarjeta-->