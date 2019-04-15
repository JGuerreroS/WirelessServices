<!-- Modal de registro de cliente-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingrese los datos del cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-6">

                        <form id="formRegistroCliente">

                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="Ingrese su nombre" required>
                            </div>

                            <div class="form-group">
                                <label>Apellidos</label>
                                <input type="text" class="form-control" id="apellido" name="apellido"
                                    placeholder="Ingrese sus apellidos" required>
                            </div>

                            <div class="form-group">
                                <label>Rut</label>
                                <input type="text" class="form-control" id="rut" name="rut"
                                    placeholder="Ingrese su Rut (ej: 12.345.678-k)" required>
                            </div>

                            <div class="form-group">
                                <label>Dirección</label>
                                <textarea class="form-control" id="direccion" name="direccion" rows="2"
                                    placeholder="Ingrese su dirección de habitación" required></textarea>
                            </div>

                    </div>

                    <div class="col-6">

                        <div class="form-group">
                            <label>Plan de internet</label>
                            <select class="select2 form-control custom-select" id="plan" name="plan">
                                <option value="">Seleccione</option>
                                <?php 
                                    include 'core/conexion.php';
                                    $sql = "SELECT id_plan, plan FROM planes";
                                    $result = mysqli_query($conn,$sql);
                                    while ($ver = mysqli_fetch_array($result)) { 
                                ?>

                                <option value="<?php echo $ver[0]; ?>"> <?php echo $ver[1]; ?> </option>

                                <?php } mysqli_free_result($result); mysqli_close($conn); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Fecha de instalación</label>
                            <input type="date" class="form-control" name="fechaInstalacion" id="fechaInstalacion">
                        </div>

                        <div class="form-group">
                            <label>Fecha de pagos</label>
                            <input type="date" class="form-control" name="fechaPagos" id="fechaPagos">
                        </div>

                        <div class="form-group">
                            <label>Dispositivo</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="opcion" id="opcion"
                                    value="1" checked>
                                <label class="form-check-label">
                                    Router
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="opcion" id="opcion"
                                    value="2">
                                <label class="form-check-label">
                                    Antena
                                </label>
                            </div>
                        </div>

                        </form>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="btn-guardarCliente" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de ver más del cliente-->
<div class="modal fade" id="m_verMas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Información detallada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="formEdit">

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Rut:</label>
                                <input type="text" name="rRut" id="rRut" class="form-control">
                            </div>
                        </div>

                        <div class="col-8">
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" name="rNombre" id="rNombre" class="form-control">
                                <input type="hidden" id="id_cliente" name="id_cliente">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Apellidos:</label>
                        <input type="text" name="rApellidos" id="rApellidos" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Plan:</label>
                                <select class="select2 form-control custom-select" id="rPlan" name="rPlan">
                                    <?php 
                                        include 'core/conexion.php';
                                        $sql = "SELECT id_plan, plan FROM planes";
                                        $result = mysqli_query($conn,$sql);
                                        while ($ver = mysqli_fetch_array($result)) { 
                                    ?>

                                    <option value="<?php echo $ver[0]; ?>"> <?php echo $ver[1]; ?> </option>

                                    <?php } mysqli_free_result($result); mysqli_close($conn); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Dispositivo:</label>
                                <select class="select2 form-control custom-select" name="rDispositivo" id="rDispositivo">
                                    <option value="1">ROUTER</option>
                                    <option value="2">ANTENA</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Dirección:</label>
                        <textarea name="rDireccion" id="rDireccion" rows="2" class="form-control"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <p id="rUsuario"></p>
                        </div>
                        
                        <div class="col-6">
                            <p id="rFecha"></p>
                        </div>
                    </div>

                    
                    
                </form>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-warning" id="editar">Editar</button>
                <button type="button" class="btn btn-success" id="guardar">Guardar</button>

            </div>
        </div>
    </div>
</div>