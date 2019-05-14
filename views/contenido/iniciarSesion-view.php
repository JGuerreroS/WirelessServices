<!DOCTYPE html>
<html>
<head>
	<title>Inicio de sesión</title>
   
	<!--Bootsrap 4-->
	<link rel="stylesheet" href="<?php echo SERVERURL; ?>public/lib/bootstrap4/bootstrap.min.css">
    
    <!--Icomoon-->
	<link rel="stylesheet" href="<?php echo SERVERURL; ?>public/lib/icomoon/fonts/style.css">

	<!--Estilos propios-->
    <link rel="stylesheet" type="text/css" href="<?php echo SERVERURL; ?>public/css/style_login.css">
</head>
<body>
<div class="container">
	<h2 class="titulo_login">TECNO ACOSTA</h2>
	<h3 class="titulo_login">Wireless Services</h3>
	<h4 class="titulo_login">Bienvenido</h4>
	<div class="d-flex justify-content-center h-100">
	
		<div class="card">
			<div class="card-header">
				<h3>Iniciar sesión</h3>
				<div class="d-flex justify-content-end social_icon">
					
					<span style="font-size:50px"><a href="https://www.facebook.com/tecnoacostaing/" class="icon-facebook2 icon-menu" target="_blank"></a></span>
						
				</div>
			</div>
			<div class="card-body">

                <div id="aviso">Error de usuario o contraseña</div>

				<form id="formLogin2">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="icon-user"></i></span>
						</div>
						<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="icon-key6"></i></span>
						</div>
						<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
					</div>
					
					<div class="form-group">
						<input type="submit" id="verify" value="Ingresar" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center">
					<!-- <a href="#" class="olvidar">Olvidaste la contraseña?</a> -->
				</div>
			</div>
		</div>
	</div>
</div>

<!--Jquery de boostrap 4-->
<script src="<?php echo SERVERURL; ?>public/lib/bootstrap4/bootstrap.min.js"></script>
	
<!--Jquery-->
<script src="<?php echo SERVERURL; ?>public/lib/jquery.min.js"></script>

<!--JS login-->
<script src="<?php echo SERVERURL; ?>public/js/login.js"></script>
</body>
</html>