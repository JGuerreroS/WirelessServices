<?php

    function datosPerfil($user){

        include '../core/conexion.php';

        $sql = "SELECT id, nombre, apellidos, rut, telefono, email, direccion FROM clientes WHERE id = $user";

        $result = mysqli_query($conn,$sql);

        $datos = new stdClass();

        while ($row = mysqli_fetch_array($result)) {
            $datos->id = $row[0];
            $datos->nombre = $row[1];
            $datos->apellidos = $row[2];
            $datos->rut = $row[3];
            $datos->telefono = $row[4];
            $datos->email = $row[5];
            $datos->direccion = $row[6];
        }

        return json_encode($datos);

    }

    function cargarConvenio($datos){

        include '../core/conexion.php';

        session_start();

        $sql = "INSERT INTO convenios (nombre_cliente, direccion, id_dispositivo, materiales, id_usuario, fecha_registro, id_estatus) VALUES ('$datos[nombre]', '$datos[direccion]', $datos[dispositivo], '$datos[materiales]', $_SESSION[usuario], '$fecha', 1)";

        if(mysqli_query($conn, $sql)){

            return 1;

        }else{

            return 2;

        }

    }

    function cargarClientes($datos){

        session_start(); 

        include '../core/conexion.php';

        $clave = password_hash($datos['rut'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO clientes (nombre, apellidos, rut, telefono, email, clave, id_plan, id_dispositivo, direccion, fecha_instalacion, fecha_pago, id_usuario, fecha_registro) VALUES ('$datos[nombre]', '$datos[apellido]', '$datos[rut]', '$datos[telefono]', '$datos[email]', '$clave',  $datos[plan], $datos[dispositivo], '$datos[direccion]', '$datos[fechaI]', $datos[fechaP], $_SESSION[usuario], '$fecha')";

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

        mysqli_free_result($result);
        mysqli_close($conn);

        return json_encode($datos);

    }

    function contarUsuarios(){

        include 'core/conexion.php';

        $sql = "SELECT COUNT(Id) FROM users";

        $result = mysqli_query($conn, $sql);

        while ($ver = mysqli_fetch_array($result)) {
            $total = $ver[0];
        }

        mysqli_free_result($result);
        mysqli_close($conn);

        return $total;

    }

    function contarClientes(){

        include 'core/conexion.php';

        $sql = "SELECT COUNT(id) FROM clientes WHERE id_estatus = 1";

        $result = mysqli_query($conn, $sql);

        while ($ver = mysqli_fetch_array($result)) {
            $clientes = $ver[0];
        }

        mysqli_free_result($result);
        mysqli_close($conn);

        return $clientes;

    }

    function contarDispositivos(){

        include 'core/conexion.php';

        $sql = "SELECT COUNT(id_dispositivo) FROM instalaciones WHERE id_estatus = 1";

        $result = mysqli_query($conn, $sql);

        while ($ver = mysqli_fetch_array($result)) {
            $dispositivos = $ver[0];
        }

        mysqli_free_result($result);
        mysqli_close($conn);

        return $dispositivos;

    }

    function grafica(){

        include '../../../core/conexion.php';

        $sql = "SELECT fecha_registro, COUNT(id) FROM clientes GROUP BY fecha_registro ORDER BY fecha_registro";

        $res = mysqli_query($conn,$sql);

        $valX = array(); // Fecha
        $valY = array(); // ID

        while($row = mysqli_fetch_array($res)){
            $valX[] = $row[0]; //Fecha
            $valY[] = $row[1]; // Id
        }

        mysqli_free_result($res);
        mysqli_close($conn);

        $datosX = json_encode($valX);
        $datosY = json_encode($valY);

        return array($datosX, $datosY);

    }

    function zoomConvenio($id_convenio){

        include '../core/conexion.php';

        $sql = "SELECT id_convenio, nombre_cliente, direccion, modelo, materiales FROM convenios c
        INNER JOIN modelos m ON (c.id_dispositivo = m.id_modelo) WHERE id_convenio = $id_convenio";

        $result = mysqli_query($conn, $sql);

        $datos = new stdClass();

        while ($ver = mysqli_fetch_array($result)){

            $datos->id_convenio = $ver[0];
            $datos->Nombres = "<b>" . $ver[1] . "</b>";
            $datos->Direccion = "<b>" . $ver[2] . "</b>";
            $datos->Dispositivo = "<b>" . $ver[3] . "</b>";
            $datos->Material = "<b>" . $ver[4] . "</b>";
           
        }

        mysqli_free_result($result);
        mysqli_close($conn);

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

    function editarPass($datos){

        include '../core/conexion.php';

        session_start();

        $result = mysqli_query($conn, "SELECT clave FROM clientes WHERE id = $_SESSION[usuario]");

        $row = mysqli_fetch_array($result);

        $hash = $row['clave'];
	
        if (password_verify($datos[0], $hash)){

            $clave = password_hash($datos[1], PASSWORD_DEFAULT);

            $sql = "UPDATE clientes SET clave = '$clave' WHERE id = $_SESSION[usuario]";

            $result = mysqli_query($conn, $sql);

            // mysqli_free_result($result);
            mysqli_close($conn);
            
            return 1;
        
        } else {

            return 2;

        }

    }

    function editarProfile($datos){

        include '../core/conexion.php';

        $sql = "UPDATE clientes SET nombre = '$datos[nombre]', apellidos = '$datos[apellidos]', telefono = '$datos[telefono]', email = '$datos[correo]', direccion = '$datos[residencia]' WHERE rut = '$datos[cliente]'";

        if(mysqli_query($conn, $sql)){

            return 1;

        }else {

            return 2;

        }

    }

    function editarPassUser($datos){

        include '../core/conexion.php';

        session_start();

        $result = mysqli_query($conn, "SELECT Password FROM users WHERE Id = $_SESSION[usuario]");

        $row = mysqli_fetch_array($result);

        $hash = $row['Password'];
	
        if (password_verify($datos['actual'], $hash)){

            $clave = password_hash($datos['nueva'], PASSWORD_DEFAULT);

            $sql = "UPDATE users SET Password='$clave' WHERE Id = $_SESSION[usuario]";

            if(mysqli_query($conn, $sql)){

                return 1;

            }else {

                return 2;

            }

        }

    }

    function editarUsuarios($datos){

        include '../core/conexion.php';

        $sql = "UPDATE users SET Name='$datos[nombre]', Usuario='$datos[correo]', nivel='$datos[nivel]' WHERE Id=$datos[id_usuario]";

        if(mysqli_query($conn, $sql)){

            return 1;

        }else {

            return 2;

        }

    }

    function borrarClientes($id_cliente){

        include '../core/conexion.php';

        $sql = "UPDATE clientes SET id_estatus = 2 WHERE id = $id_cliente";

        $result = mysqli_query($conn, $sql);

        if($result){

            mysqli_close($conn);
            return 1;

        }else{

            return 2;

        }

    }

    function borrarConvecion($id_convenio,$causa){

        include '../core/conexion.php';

        session_start();

        $sql = "UPDATE convenios SET id_estatus = 2, id_causa = $causa, fecha_egreso = '$fecha', egresado_por = $_SESSION[usuario] WHERE id_convenio = $id_convenio";

        if(mysqli_query($conn, $sql)){

            return 1;

        }else{

            return 2;

        }

    }

    function reporteClientes(){

        include 'core/conexion.php';

        $sql = "SELECT rut, CONCAT(nombre, ' ', apellidos) AS cliente, telefono, email, fecha_registro FROM clientes WHERE id_estatus = 1 ORDER BY rut";

        $result = mysqli_query($conn,$sql);

        // mysqli_free_result($conn);
        mysqli_close($conn);

        return $result;

    }

    function perfilCliente($id_cliente){

        include 'core/conexion.php';

        $sql = "SELECT c.id, CONCAT(nombre, ' ', apellidos) AS cliente, rut, plan, modelo, direccion, c.fecha_registro, fecha_pago, telefono, email, costo FROM clientes c
        INNER JOIN planes p ON (c.id_plan = p.id_plan)
        INNER JOIN modelos m ON (c.id_dispositivo = m.id_modelo) WHERE id = $id_cliente";

        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_array($result);

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
        INNER JOIN modelos m ON (c.id_dispositivo = m.id_modelo) WHERE id_estatus = 1";

        return mysqli_query($conn, $sql);

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

    function verConvenios(){

        include '../../../core/conexion.php';

        $sql = "SELECT id_convenio, nombre_cliente, direccion, modelo FROM convenios c
        INNER JOIN modelos m ON (c.id_dispositivo = m.id_modelo) WHERE id_estatus = 1";

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
        WHERE rut = '$rut'";

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

        return mysqli_query($conn, $sql);

    }

    function verFacturas(){

        include '../../../core/conexion.php';

        $sql = "SELECT id_factura, CONCAT(rut, ' ', nombre, ' ', apellidos, ' ') AS cliente, plan, p.costo, f.fecha_pago, referencia FROM facturacion f
        INNER JOIN clientes c ON (f.id_cliente = c.id)
        INNER JOIN planes p ON (f.id_plan = p.id_plan) ORDER BY id_factura DESC";

        return mysqli_query($conn, $sql);

    }

    function registroFactura($datos){

        include '../core/conexion.php';
 
        session_start();

        $sql = "INSERT INTO facturacion (id_cliente, id_plan, costo, fecha_pago, referencia, fecha_registro, id_usuario) VALUES ($datos[cliente], $datos[plan], $datos[total], '$datos[fechaPago]', '$datos[referencia]', '$fecha', $_SESSION[usuario])";

        if(mysqli_query($conn, $sql)){

            return 1;

        }else{

            return 2;

        }

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