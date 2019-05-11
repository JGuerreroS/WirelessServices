<?php

class vistasModelo{

    protected function obtener_vistas_modelo($vistas){

        $listaBlanca = ["inicio", "clientes", "convenios", "usuarios", "instalaciones", "otros", "perfil", "facturacion"];

        if (in_array($vistas,$listaBlanca)) {
            if (is_file("./views/contenido/" . $vistas. "-view.php")) {
                $contenido = "./views/contenido/" . $vistas. "-view.php";

                    if($contenido == "./views/contenido/perfil-view.php"){

                        $contenido = 'perfil';

                    }

            } else {

                $contenido = 'login';

            }
            
        } elseif($vistas == 'login'){

            $contenido = 'login';

        }elseif($vistas == 'index'){

            $contenido = 'login';

        }elseif($vistas = '404'){

            $contenido = '404';

        }else{

            $contenido = '404';

        }

        return $contenido;

    }

}


?>