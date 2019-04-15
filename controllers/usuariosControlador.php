<?php

require_once './models/usuariosModelo.php';

class UsuariosControlador extends UsuariosModelo{

    function obtenerUsuariosControlador(){

        $usuarios = new UsuariosModelo();

        return $usuarios->obtenerUsuariosModelo();
        
    }


}