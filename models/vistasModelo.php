<?php

class vistasModelo{

    protected function obtener_vistas_modelo($vistas){

        $listaBlanca = ["inicio", "registroCliente", "registroMascota", "registroUsuarios", "productos", "especies", "otros"];

        if (in_array($vistas,$listaBlanca)) {
            if (is_file("./views/contenido/" . $vistas. "-view.php")) {
                $contenido = "./views/contenido/" . $vistas. "-view.php";
            } else {
                $contenido = 'login';
            }
            
        } elseif($vistas == 'login'){

            $contenido = 'login';

        }elseif($vistas == 'index'){

            $contenido = 'login';

        }elseif($vistas = 'reporte'){

            $contenido = 'reporte';

        }else{

            $contenido = '404';

        }

        return $contenido;

    }

}


?>