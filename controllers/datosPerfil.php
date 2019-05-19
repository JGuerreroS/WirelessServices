<?php

    include '../models/clase.php';

    session_start();

    echo datosPerfil($_SESSION['usuario']);