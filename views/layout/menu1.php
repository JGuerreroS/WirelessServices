<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- <a class="navbar-brand" href="bienvenido">
        <img src="public/img/9.png" width="60" height="40" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> -->

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">

            <!-- <li class="nav-item active">
                <a class="nav-link" href="#"> <i class="icon-monetization_on"></i> Reportar pago </a>
            </li> -->

            <li class="nav-item">
                <a class="nav-link" href="tuPerfil"> <i class="icon-perm_contact_calendar"></i> Perfil</a>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link" href="#"> <i class="icon-perm_data_setting"></i> Soporte técnico</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"> <i class="icon-router"></i> Dispositivos</a> -->
            </li>

            <!-- <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Administración
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="especies"> <span class="icon-goat"></span> Especies </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="otros"> <span class="icon-th-small"></span> Otros </a>
                </div>

            </li> -->

            <li class="nav-item">
                <a class="nav-link disabled text-info" href="#">
                <i class="icon-user-tie"></i>
                    <?php
                    if($_SESSION['nombre'] == ''){
                        header('Location: ./controllers/cerrarSesion2.php');
                    }else{
                        echo $_SESSION['nombre'];
                    }
                ?>
                </a>
            </li>

        </ul>

        <a class="btn btn-outline-success my-2 my-sm-0" href="./controllers/cerrarSesion2.php">Cerrar sesión</a>

    </div>
</nav>