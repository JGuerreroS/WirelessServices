<!-- Modal registro de convenios -->
<div class="modal fade" id="convenioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo convenio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="frmRegConvenio">

                <div class="form-group">
                    <label class="font-weight-bold"> Nombre del cliente: </label>
                    <input type="text" class="form-control" id="cNombre" name="cNombre" placeholder="Nombre y apellidos">
                </div>

                <div class="form-group">
                    <label class="font-weight-bold"> Dirección planta internet: </label>
                    <textarea class="form-control" name="cDireccion" id="cDireccion" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold"> Equipos instalados: </label>
                    <select class="custom-select" id="cDispositivo" name="cDispositivo">
                        <option value=""> Seleccione dispositivo </option>
                        <?php 
                            include 'core/conexion.php';
                            $sql = "SELECT id_modelo, modelo FROM modelos";
                            $result = mysqli_query($conn,$sql);
                            while ($ver = mysqli_fetch_array($result)) { 
                        ?>

                        <option value="<?php echo $ver[0]; ?>"> <?php echo $ver[1]; ?> </option>

                        <?php } mysqli_free_result($result); mysqli_close($conn); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold"> Materiales: </label>
                    <textarea class="form-control" name="cMateriales" id="cMateriales" rows="3"></textarea>
                </div>
            </form>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-success" id="regConvenio">Guardar</button>
        </div>
        </div>
    </div>
</div>

<!-- Modal ver mas convenio -->
<div class="modal fade" id="modalZoomConvenio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ver detalles del convenio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="">
                    
                <div class="form-group">
                    <p id="zNombres"></p>
                </div>
                            
                 <div class="form-group">
                    <p id="zDireccion"></p>
                </div>
                           
                <div class="form-group">
                    <p id="zDispositivo"></p>
                </div>
                            
                <div class="form-group">
                    <p id="zMateriales"></p>
                </div>

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
</div>

<!-- Modal de eliminar convenio -->
<div class="modal fade" id="modalBConvenio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="frmEliminarConvenio">
                <input type="hidden" name="id_convenioB" id="id_convenioB">
                <label>Especifica la causa de la eliminación</label>
                <select name="causaC" id="causaC" class="form-control">
                    <option value="0">Seleccione</option>
                    <option value="3">Suspención por termino de contrato</option>
                </select>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-danger" id="eliminarConvenio"> <i class="icon-bin"></i> </button>
        </div>
        </div>
    </div>
</div>