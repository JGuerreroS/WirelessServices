    <div class="card-header">
        <h5>Bienvenid@ <?php echo $_SESSION['name']; include 'models/clase.php'; ?> </h5>
    </div>

    <div class="card-body">
    
    <!-- Agregar aqui el contenido -->
    
    <div class="row">
		<!-- Column -->
		<div class="col-md-6 col-lg-2 col-xlg-3">
			<a href="1-inicio.php" class="card card-hover enlace">
				<div class="box text-center">
					<h1 class="font-light"><i class="icon-dashboard"></i></h1>
					<h6>Inicio</h6>
				</div>
			</a>
		</div>

		<div class="col-md-6 col-lg-2 col-xlg-3">
			<a href="3-estadisticas.php" class="card card-hover enlace">
				<div class="box text-center">
					<h1 class="font-light"><i class="icon-chart3"></i></h1>
					<h6>Estadísticas</h6>
				</div>
			</a>
		</div>
		
		<div class="col-md-6 col-lg-2 col-xlg-3">
			<a href="3-1-solicitud.php" class="card card-hover enlace">
				<div class="box text-center">
					<h1 class="font-light"><i class="icon-document-edit2"></i></h1>
					<h6>Solicitudes</h6>
				</div>
			</a>
		</div>
		<!-- Column -->
		<div class="col-md-6 col-lg-2 col-xlg-3">
			<a href="3-2-experticias.php" class="card card-hover enlace">
				<div class="box text-center">
					<h1 class="font-light"><i class="icon-search4"></i></h1>
					<h6>Experticias</h6>
				</div>
			</a>
		</div>
		<!-- Column -->
		<div class="col-md-6 col-lg-2 col-xlg-3">
			<a href="4-1-usuarios.php" class="card card-hover enlace">
				<div class="box text-center">
					<h1 class="font-light"><i class="icon-user"></i></h1>
					<h6>Usuarios</h6>
				</div>
			</a>
		</div>
		<!-- Column -->
		<div class="col-md-6 col-lg-2 col-xlg-3">
			<a href="4-3-funcionarios.php" class="card card-hover enlace">
				<div class="box text-center">
					<h1 class="font-light"><i class="icon-users"></i></h1>
					<h6>Expertos</h6>
				</div>
			</a>
		</div>
		<!-- Column -->
	</div> <!-- Fin div.row -->

<!-- Sección de estadísticas -->
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="d-md-flex align-items-center">
						<div>
							<h4 class="card-title">Resumen estadístico</h4>
							
						</div>
					</div>
					<div class="row">
						<!-- column -->
						<div class="col-lg-9">
							<div id="visitas"></div>
						</div>
						<div class="col-lg-3">
							<div class="row">
								<div class="col-6 resumen">
									<div class="bg-dark p-10 text-white text-center">
										<i class="icon-users"></i>
										<h5 class="m-b-0 m-t-5">
                                            <?php echo contarUsuarios(); ?>
                                        </h5>
										<small class="font-light">Usuarios</small>
									</div>
								</div>

								<div class="col-6 resumen">
									<div class="bg-dark p-10 text-white text-center">
										<i class="icon-assignment_ind"></i>
										<h5 class="m-b-0 m-t-5">
                                            <?php echo contarClientes(); ?>
                                        </h5>
										<small class="font-light">Clientes</small>
									</div>
								</div>

								<div class="col-6 resumen">
									<div class="bg-dark p-10 text-white text-center">
										<i class="icon-router"></i>
										<h5 class="m-b-0 m-t-5"> <?php echo contarDispositivos(); ?> </h5>
										<small class="font-light">Dispositivos instalados</small>
									</div>
								</div>
							</div>
						</div>
						<!-- column -->
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Hasta aqui el contenido -->
    </div>    