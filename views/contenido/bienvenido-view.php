    <div class="card-header">
        <b>Bienvenido <?php echo $_SESSION['nombre']; include 'models/clase.php'; ?> </b>
    </div>

    <div class="card-body">
    
    <!-- Agregar aqui el contenido -->
    

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
							<div id="grafica"></div>
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