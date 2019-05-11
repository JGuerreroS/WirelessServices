<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="inicio">
        <img src="public/img/prueba.png" width="50" height="40" alt="">
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
                    <i class="icon-contacts2"></i> Clientes
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="clientes"> <i class="icon-people"></i> Lista de clientes </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="instalaciones"> <i class="icon-cord"></i> Instalaciones </a>
                </div>

            </li>

            <li class="nav-item active">
                <a class="nav-link" href="facturacion"> <i class="icon-monetization_on"></i> Facturación </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="convenios"> <i class="icon-group-outline"></i> Convenios </a>
            </li>

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="icon-cogs"></i> Administración
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="usuarios"> <i class="icon-users"></i> Usuarios </a>
                
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="otros"> <span class="icon-spinner4"></span> Otros </a>
                </div>

            </li>

            

            <li class="nav-item">
                <a class="nav-link disabled text-info" href="#">
                    <i class="icon-user-tie"></i>
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

        <a class="btn btn-outline-success my-2 my-sm-0" href="./controllers/cerrarSesion.php" title="Cerrar sesión"> <i class="icon-settings_power"></i> </a>

    </div>
</nav>