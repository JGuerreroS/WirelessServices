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

<!-- Modal ver mas instalacion -->
<div class="modal fade" id="modalVerInstalacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ver detalles de la instalación</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="frmEditarInstalacion">
            
                            
                <div class="form-group">
                    <p id="vMrut"></p>
                </div>
                            
                <div class="form-group">
                    <p id="vMnombres"></p>
                </div>
                            
                <div class="form-group">
                    <p id="vMdireccion"></p>
                </div>
                            
                <div class="form-group">
                    <p id="vMdispositivo"></p>
                </div>

                <input type="hidden" id="vMinstalacion" name="vMinstalacion">

                <div class="form-group">
                    <label>Serial:</label>
                    
                    <input type="text" class="form-control" id="vMserial" name="vMserial">
                </div>

                <div class="form-group">
                    <label>Materiales:</label>
                    <textarea class="form-control" name="vMmaterial" id="vMmaterial" rows="3"></textarea>
                </div>

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="cerrarModalEditarInstalacion" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-warning" id="editarInstalacion">Editar</button>
            <button type="button" class="btn btn-success" id="guardarInstalacionEditada">Guardar</button>
        </div>
        </div>
    </div>
</div>

<!-- Modal de eliminar instalacion -->
<div class="modal fade" id="modalBorrarInstalacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="frmEliminarInstalacion">
                <input type="hidden" name="id_instalacionB" id="id_instalacionB">
                <label>Especifica la causa de la eliminación</label>
                <select name="causa" id="causa" class="form-control">
                    <option value="">Seleccione</option>
                    <option value="1">Suspención por falta de pago</option>
                    <option value="2">Suspención por cambio de proveedor</option>
                    <option value="3">Suspención por termino de contrato</option>
                </select>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="cerrarModalEditarInstalacion" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-danger" id="eliminarInstalacion"> <i class="icon-bin"></i> </button>
        </div>
        </div>
    </div>
</div>