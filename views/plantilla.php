<?php

    require_once './controllers/vistasControlador.php';

    $vt = new vistasControlador();

    $vistasR = $vt->obtener_vistas_controlador();

    if($vistasR == 'login' || $vistasR == 'iniciarSesion' || $vistasR == '404' || $vistasR == 'perfil' || $vistasR == 'reporteClientes'):

        if ($vistasR == 'login') {

            require_once './views/contenido/login-view.php';

        }elseif($vistasR == 'iniciarSesion'){

            require_once './views/contenido/iniciarSesion-view.php';

        }elseif($vistasR == 'perfil'){

            require_once './views/contenido/perfil-view.php';

        }elseif ($vistasR == 'reporteClientes') {

            require_once './views/contenido/reporteClientes-view.php';

        }
        
        else {

            require_once './views/contenido/404-view.php';

        }
        
    else:

?>

<?php
    session_start();
    include 'layout/header.php';
?>

<?php require_once $vistasR; ?>

</div> <!-- Cierre del Div Container, abierto en Header.php, antes del menú -->



        <div class="card-footer text-muted text-center">
            TecnoAcosta Wireless Services © <?php echo date('Y')."."?>
        </div>

    </div> <!-- Fin de la tarjeta-->

    <?php endif; ?>
    <?php include 'layout/scriptsFooter.php'; ?>
    
</body>
</html>