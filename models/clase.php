<?php

    function cargarClientes($datos){

        include '../core/conexion.php';

        $sql = "INSERT INTO clientes (nombre, apellidos, rut, telefono, email, id_plan, id_dispositivo, direccion, fecha_instalacion, fecha_pago, id_usuario, fecha_registro) VALUES ('$datos[nombre]', '$datos[apellido]', '$datos[rut]', '$datos[telefono]', '$datos[email]', $datos[plan], $datos[dispositivo], '$datos[direccion]', '$datos[fechaI]', '$datos[fechaP]', $datos[usuario], '$fecha')";

        if(mysqli_query($conn, $sql)){

            return 1;

        }else{

            return 2;

        }

    }

    function editarClientes($datos){

        include '../core/conexion.php';

        $sql = "UPDATE clientes SET nombre='$datos[nombre]', apellidos='$datos[apellidos]', rut='$datos[rut]', telefono='$datos[telefono]', email='$datos[email]', id_plan=$datos[plan], id_dispositivo=$datos[dispositivo], direccion='$datos[direccion]' where id=$datos[id_cliente]";

        if (mysqli_query($conn, $sql)) {
            
            return 1;
            
        } else {
            
            return 2;
            
        }

    }

    function editarUsuarios($datos){

        include '../core/conexion.php';

        $sql = "UPDATE users SET Name='$datos[nombre]', Usuario='$datos[correo]', nivel='$datos[nivel]' where Id=$datos[id_usuario]";

        if(mysqli_query($conn, $sql)){

            echo 1;

        }else {

            echo 2;

        }

       

    }

    function editarMascotas($datos){

        include '../core/conexion.php';

        $sql = "UPDATE mascota SET microchip='$datos[microchip]', nombre='$datos[nombre]', id_especie=$datos[especie], id_raza=$datos[raza], sexo=$datos[sexo], fecha_nacimiento='$datos[nacimiento]', id_color=$datos[color], esterilizado=$datos[esterilizado], id_patron_color=$datos[patron] where id_mascota=$datos[id_mascota]";

        if (mysqli_query($conn, $sql)) {
            return 1;
        } else {
            return 2;
        }
    
    }

    function borrarClientes($id_cliente){

        include '../core/conexion.php';

        $sql = "DELETE FROM clientes WHERE id = $id_cliente";

        return $result = mysqli_query($conn, $sql);

    }

    function borrarUsuario($id_usuario){

        include '../core/conexion.php';

        $sql = "DELETE FROM users WHERE Id = $id_usuario";

        if (mysqli_query($conn, $sql)) {

            return 1;

        } else {

            return 2;

        }
    
    }
    
    function borrarMascotas($id_mascota){

        include '../core/conexion.php';

        // Consulta para obtener el nombre del archivo pdf
        $borrar = mysqli_query($conn,"SELECT certificado, calidad FROM mascota WHERE id_mascota = $id_mascota");

        // Almacenar arreglo
        $row = mysqli_fetch_assoc($borrar);

        // Concatenar ruta junto con el nombre del archivo
        $certificado = "../uploads/certificados/".$row['certificado'];
        $calidad = "../uploads/calidad/".$row['calidad'];

        // Consulta de eliminar registro
        $sql = "DELETE FROM mascota WHERE id_mascota = $id_mascota";

        // Ejecutar consulta
        $result = mysqli_query($conn, $sql);

        if ($result) {

            // Eliminar archivos
            unlink($certificado);
            unlink($calidad);

            return 1;

        }
        
    }

    function verDispositivos(){

        include '../../../core/conexion.php';

        $sql = "SELECT modelo FROM modelos";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function verClientes(){

        include '../../../core/conexion.php';

        $sql = "SELECT c.id, CONCAT(nombre, ' ', apellidos) AS cliente, rut, plan, modelo, direccion FROM clientes c
        INNER JOIN planes p ON (c.id_plan = p.id_plan)
        INNER JOIN modelos m ON (c.id_dispositivo = m.id_modelo)";

        return $result = mysqli_query($conn, $sql);

    }

    function verDetallesClientes($cliente){

        include '../core/conexion.php';

        $sql = "SELECT c.id, nombre, apellidos, rut, telefono, email, id_plan, id_dispositivo, direccion, Name, c.fecha_registro FROM clientes c
        INNER JOIN users u ON (c.id_usuario = u.Id) WHERE c.id = $cliente";

        $result = mysqli_query($conn, $sql);

        $datos = new stdClass();

        while ($ver = mysqli_fetch_array($result)){

            $datos->Id=$ver[0];
            $datos->Nombre=$ver[1];
            $datos->Apellidos=$ver[2];
            $datos->Rut=$ver[3];
            $datos->Telefono=$ver[4];
            $datos->Email=$ver[5];
            $datos->Plan=$ver[6];
            $datos->Dispositivo=$ver[7];
            $datos->Direccion=$ver[8];
            $datos->Usuario=$ver[9];
            $datos->Fecha=str_replace('-', '/', date('d-m-Y', strtotime($ver[10])));

        }

        mysqli_free_result($result);
        mysqli_close($conn);

        return json_encode($datos);

    }

    function registroEspecie($especie){

        include '../core/conexion.php';

        $sql = "insert into especies (nombre) values ('$especie')";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function registroRaza($datos){

        include '../core/conexion.php';

        $sql = "insert into razas (id_especie, nombre) values ($datos[especie], '$datos[raza]')";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function verAnimales(){

        include 'core/conexion.php';

        $sql = "SELECT e.nombre, r.nombre FROM razas r inner join especies e on (r.id_especie = e.id)";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function verPlanes(){

        include '../../../core/conexion.php';

        $sql = "SELECT id_plan, plan FROM planes";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function verObtencion(){

        include 'core/conexion.php';

        $sql = "SELECT id_obtencion, obtencion FROM obtencion";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function verColores(){

        include 'core/conexion.php';

        $sql = "SELECT id_color, color FROM colores";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function verPatron(){

        include 'core/conexion.php';

        $sql = "SELECT id_patron, patron FROM patron_color";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function cargarPlan($plan){

        include '../core/conexion.php';

        $sql = "INSERT INTO planes (plan) VALUES ('$plan')";

        if (mysqli_query($conn, $sql)) {

            mysqli_close($conn);

            return 1;

        } else {

            return 2;

        }
        
    }

    function cargarMarca($marca){

        include '../core/conexion.php';

        $sql = "INSERT INTO marcas (marca) values ('$marca')";

        if(mysqli_query($conn, $sql)){

            mysqli_close($conn);
            return 1;

        }else{

            return 2;

        }

    }

    function cargarModelos($modelo){

        include '../core/conexion.php';

        $sql = "INSERT INTO modelos (modelo) VALUES ('$modelo')";

        if(mysqli_query($conn, $sql)){

            mysqli_close($conn);
            return 1;

        }else{

            return 2;

        }

    }

    function cargarPatron($patron){

        include '../core/conexion.php';

        $sql = "INSERT INTO patron_color (patron) values ('$patron')";

        $result = mysqli_query($conn, $sql);

        mysqli_close($conn);

        return $msg = "<script>
                            alert('Patron registrado correctamente');
                            window.location='../otros';
                        </script>";

    }

    function registrarMascota($datos){

        include '../core/conexion.php';

        // Verificar que la mascota no se encuentre ya registrada
        $verificar = "select * from mascota where microchip='$datos[micro]'";
        $resVerificar = mysqli_query($conn,$verificar);
        $totalVerificar = mysqli_num_rows($resVerificar);
        
        if($totalVerificar == 0){ // Si no esta registrada

            // Se registra
            $sql = "insert into mascota (microchip, nombre, id_especie, id_raza, sexo, fecha_nacimiento, id_color, id_patron_color, esterilizado, id_propietario, id_obtencion, id_razon, certificado, calidad, id_usuario, fecha_registro) values ('$datos[micro]','$datos[nombre]', $datos[especie], $datos[raza], $datos[sexo], '$datos[nacimiento]', $datos[color], $datos[patron], $datos[opcion], $datos[dueno], $datos[modo], $datos[razon], '$datos[certificado]', '$datos[calidad]', $datos[usuario], '$fecha')";

            $result = mysqli_query($conn,$sql);

            mysqli_close($conn);

            return 1;
        
        }else{ // Si esta registrada, no se vuelve a registrar

            return 2;
        
        }

    }

    function verMascotas(){

        include '../../../core/conexion.php';

        $sql = "SELECT id_mascota, microchip, m.nombre, e.nombre as especie, r.nombre as raza, sexo, fecha_nacimiento, color, CONCAT(cl.run, ' ' , cl.nombre, ' ', cl.apellidos) as propietario, m.fecha_registro FROM mascota m
        INNER JOIN especies e ON (m.id_especie = e.id)
        INNER JOIN razas r ON (m.id_raza = r.id)
        INNER JOIN colores c ON (m.id_color = c.id_color)
        INNER JOIN clientes cl ON (m.id_propietario = cl.id)";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function verMascotasReporte($fechas){

        include 'core/conexion.php';

        if ($fechas['desde'] == '' || $fechas['hasta'] == '') {

            $sql = "SELECT id_mascota, microchip, m.nombre, e.nombre as especie, r.nombre as raza, sexo, fecha_nacimiento, color, CONCAT(cl.run, ' ' , cl.nombre) as propietario, m.fecha_registro FROM mascota m
            INNER JOIN especies e ON (m.id_especie = e.id)
            INNER JOIN razas r ON (m.id_raza = r.id)
            INNER JOIN colores c ON (m.id_color = c.id_color)
            INNER JOIN clientes cl ON (m.id_propietario = cl.id)";

            return mysqli_query($conn, $sql);

        } else {

            $sql = "SELECT id_mascota, microchip, m.nombre, e.nombre as especie, r.nombre as raza, sexo, fecha_nacimiento, color, CONCAT(cl.run, ' ' , cl.nombre) as propietario, m.fecha_registro FROM mascota m
            INNER JOIN especies e ON (m.id_especie = e.id)
            INNER JOIN razas r ON (m.id_raza = r.id)
            INNER JOIN colores c ON (m.id_color = c.id_color)
            INNER JOIN clientes cl ON (m.id_propietario = cl.id) WHERE m.fecha_registro BETWEEN '$fechas[desde]' AND '$fechas[hasta]'";

            return mysqli_query($conn, $sql);

        }

        
    
    }

    function verUsuarios(){

        include '../../../core/conexion.php';

        $sql = "SELECT Id, Name, Usuario, fecha_registro FROM users";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function registroUsuario($datos){

        include '../core/conexion.php';

        $passHash = password_hash($datos['clave'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (Name, Usuario, Password, nivel, id_usuario, fecha_registro) VALUES ('$datos[nombre]', '$datos[email]', '$passHash', $datos[privilegio], $datos[usuario], '$fecha')";

        if(mysqli_query($conn, $sql)){

            return 2;

        }else{

            return 3;

        }

    }