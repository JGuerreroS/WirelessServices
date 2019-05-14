<?php
	session_start();

	require_once '../core/conexion.php';

	$user = $_POST['usuario']; 
	$password = $_POST['password'];

	$result = mysqli_query($conn, "SELECT Id, Name, Usuario, password, nivel FROM users WHERE Usuario = '$user'");
	
	$row = mysqli_fetch_assoc($result);
	
	$hash = $row['password'];
	
	if (password_verify($_POST['password'], $hash)) {	
		
		$_SESSION['name'] = $row['Name'];
		$_SESSION['usuario'] = $row['Id'];
		$_SESSION['nivel'] = $row['nivel'];
		
		echo 1;
	
	} else {

		echo 2;

	}