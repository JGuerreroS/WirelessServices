<?php

    function registroInstalacion($datos){

        include '../core/conexion.php';

        $sql = "INSERT INTO instalaciones (id_cliente, id_dispositivo, serial, materiales) VALUES ($datos[cliente], $datos[dispositivo], '$datos[serial]', '$datos[material]')";

        if(mysqli_query($conn, $sql)){

            return 1;

        }else{

            return 2;

        }

    }

    function cargarClientes($datos){

        include '../core/conexion.php';

        $sql = "INSERT INTO clientes (nombre, apellidos, rut, telefono, email, id_plan, id_dispositivo, direccion, fecha_instalacion, fecha_pago, id_usuario, fecha_registro) VALUES ('$datos[nombre]', '$datos[apellido]', '$datos[rut]', '$datos[telefono]', '$datos[email]', $datos[plan], $datos[dispositivo], '$datos[direccion]', '$datos[fechaI]', $datos[fechaP], $datos[usuario], '$fecha')";

        if(mysqli_query($conn, $sql)){

            return 1;

        }else{

            return 2;

        }

    }

    function editarClientes($datos){

        include '../core/conexion.php';

        $sql = "UPDATE clientes SET nombre='$datos[nombre]', apellidos='$datos[apellidos]', rut='$datos[rut]', telefono='$datos[telefono]', email='$datos[email]', id_plan=$datos[plan], id_dispositivo=$datos[dispositivo], fecha_instalacion='$datos[fechaI]', fecha_pago=$datos[fechaP], direccion='$datos[direccion]' where id=$datos[id_cliente]";

        if (mysqli_query($conn, $sql)) {
            
            return 1;
            
        } else {
            
            return 2;
            
        }

    }

    function editarDispositivos($id_modelo,$modelo){

        include '../core/conexion.php';

        $sql = "UPDATE modelos SET modelo='$modelo' WHERE id_modelo=$id_modelo";

        if (mysqli_query($conn, $sql)) {
            
            return 1;
            
        } else {
            
            return 2;
            
        }

    }

    function verMasPlanes($id_plan){

        include '../core/conexion.php';

        $sql = "SELECT id_plan, plan, costo FROM planes WHERE id_plan=$id_plan";

        $result = mysqli_query($conn, $sql);

        $datos = new stdClass();

        while ($ver = mysqli_fetch_array($result)) {
            $datos->id_plan=$ver[0];
            $datos->plan=$ver[1];
            $datos->costo=$ver[2];
        }

        return json_encode($datos);

    }

    function editarPlanes($id_plan,$plan,$costo){

        include '../core/conexion.php';

        $sql = "UPDATE planes SET plan='$plan', costo=$costo WHERE id_plan=$id_plan";

        if(mysqli_query($conn, $sql)){

            return 1;

        }else {

            return 2;

        }

    }

    function editarUsuarios($datos){

        include '../core/conexion.php';

        $sql = "UPDATE users SET Name='$datos[nombre]', Usuario='$datos[correo]', nivel='$datos[nivel]' where Id=$datos[id_usuario]";

        if(mysqli_query($conn, $sql)){

            return 1;

        }else {

            return 2;

        }

    }

    function borrarClientes($id_cliente){

        include '../core/conexion.php';

        $sql = "DELETE FROM clientes WHERE id = $id_cliente";

        return $result = mysqli_query($conn, $sql);

    }

    function borrarDispositivo($id_modelo){

        include '../core/conexion.php';

        $sql = "DELETE FROM modelos WHERE id_modelo = $id_modelo";

        if(mysqli_query($conn, $sql)){

            return 1;

        }else{

            return 2;

        }

    }

    function borrarPlanes($id_plan){

        include '../core/conexion.php';

        $sql = "DELETE FROM planes WHERE id_plan = $id_plan";

        if(mysqli_query($conn, $sql)){

            return 1;

        }else{

            return 2;

        }

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
    
    function verDispositivos(){

        include '../../../core/conexion.php';

        $sql = "SELECT id_modelo, modelo FROM modelos";

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

        $sql = "SELECT c.id, nombre, apellidos, rut, telefono, email, id_plan, id_dispositivo, fecha_instalacion, fecha_pago, direccion, Name, c.fecha_registro FROM clientes c
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
            $datos->FechaI=$ver[8];
            $datos->FechaP=$ver[9];
            $datos->Direccion=$ver[10];
            $datos->Usuario=$ver[11];
            $datos->Fecha=str_replace('-', '/', date('d-m-Y', strtotime($ver[12])));

        }

        mysqli_free_result($result);
        mysqli_close($conn);

        return json_encode($datos);

    }

    function verInstalaciones(){

        include '../../../core/conexion.php';

        $sql = "SELECT id_instalacion, rut, modelo, serial FROM instalaciones i
        INNER JOIN clientes c ON (i.id_cliente = c.id)
        INNER JOIN modelos m ON (i.id_dispositivo = m.id_modelo)";

        return mysqli_query($conn, $sql);

    }

    function verPlanes(){

        include '../../../core/conexion.php';

        $sql = "SELECT id_plan, plan, costo FROM planes";

        return mysqli_query($conn, $sql);

    }

    function buscarDatosCliente($rut){

        include '../core/conexion.php';

        $sql = "SELECT id, concat(nombre, ' ' , apellidos), plan, m.id_modelo, modelo FROM clientes c
        INNER JOIN planes p ON (c.id_plan = p.id_plan)
        INNER JOIN modelos m ON (c.id_dispositivo = m.id_modelo)
        WHERE rut = $rut";

        $result = mysqli_query($conn, $sql);

        $datos = new stdClass;

        while ($ver = mysqli_fetch_array($result)) {

            $datos->idCliente=$ver[0];
            $datos->Nombre="<b>".$ver[1]."</b>";
            $datos->Plan="<b>".$ver[2]."</b>";
            $datos->id_dispositivo=$ver[3];
            $datos->Dispositivo="<b>".$ver[4]."</b>";

        }

        return json_encode($datos);

    }

    function cargarPlan($plan,$costo){

        include '../core/conexion.php';

        $sql = "INSERT INTO planes (plan, costo) VALUES ('$plan', $costo)";

        if (mysqli_query($conn, $sql)) {

            mysqli_close($conn);

            return 1;

        } else {

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