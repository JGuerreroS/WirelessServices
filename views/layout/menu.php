<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="inicio">
        <img src="public/img/5.jpg" width="60" height="40" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Clientes
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="registroCliente"> <span class="icon-user"></span> Lista de clientes </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="instalaciones"> <span class="icon-location_city"></span> Instalaciones </a>

                </div>

            </li>

            <!-- <li class="nav-item">
                <a class="nav-link" href="registroMascota">Mascotas</a>
            </li> -->

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Administración
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="registroUsuarios"> <span class="icon-user"></span> Usuarios </a>
                    <!-- <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="especies"> <span class="icon-goat"></span> Especies </a> -->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="otros"> <span class="icon-th-small"></span> Otros </a>
                </div>

            </li>

            <li class="nav-item">
                <a class="nav-link disabled" href="#">
                    <?php
                    if($_SESSION['name'] == ''){
                        header('Location: ./controllers/cerrarSesion.php');
                    }else{
                        echo $_SESSION['name'];
                    }
                ?>
                </a>
            </li>

        </ul>

        <a class="btn btn-outline-success my-2 my-sm-0" href="./controllers/cerrarSesion.php">Cerrar sesión</a>

    </div>
</nav>