<?php
	session_start();

	require_once '../core/conexion.php';

	$user = $_POST['usuario']; 
	$password = $_POST['password'];

	$result = mysqli_query($conn, "SELECT id, nombre, clave FROM clientes WHERE email = '$user'");
	
	$row = mysqli_fetch_assoc($result);
	
	$hash = $row['clave'];
	
	if (password_verify($password, $hash)) {	
		
		$_SESSION['nombre'] = $row['nombre'];
		$_SESSION['usuario'] = $row['id'];
		
		echo 1;
	
	} else {

		echo 2;

	}