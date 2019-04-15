<?php
session_start();

	// Connection info. file
	require_once '../core/conexion.php';

	// data sent from form login.html 
	$user = $_POST['usuario']; 
	$password = $_POST['password'];
	
	// Query sent to database
	$result = mysqli_query($conn, "SELECT Id, Name, Usuario, password, nivel FROM users WHERE Usuario = '$user'");
	
	// Variable $row hold the result of the query
	$row = mysqli_fetch_assoc($result);
	
	// Variable $hash hold the password hash on database
	$hash = $row['password'];
	
	/* 
	password_Verify() function verify if the password entered by the user
	match the password hash on the database. If everything is ok the session
	is created for one minute. Change 1 on $_SESSION[start] to 5 for a 5 minutes session.
	*/
	if (password_verify($_POST['password'], $hash)) {	
		
		$_SESSION['name'] = $row['Name'];
		$_SESSION['usuario'] = $row['Id'];
		$_SESSION['nivel'] = $row['nivel'];
		
		echo 1;
	
	} else {

		echo 2;

	}	
?>