<!-- Modal registro de instalación -->
<div class="modal fade" id="modalInstalacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registrar nueva instalación del servicio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="frmRegistroInstalacion">
            
                <div class="form-group">
                    <label> RUT: </label>
                    <div class="form-row align-items-center">
                        <div class="col-sm-3 my-1">

                            <input type="text" class="form-control" name="rCliente" id="rCliente" placeholder="Rut...">
                            <input type="hidden" name="iCliente" id="iCliente">
                            <input type="hidden" name="iDispositivo" id="iDispositivo">

                        </div>
                        
                        <div class="col-auto my-1">
                            <button class="btn btn-primary" id="buscarCliente">Buscar cliente</button>
                            <button class="btn btn-secondary" id="buscarOtro">Buscar otro cliente</button>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <p id="Inombres"></p>
                </div>

                <div class="form-group">
                    <p id="Iplan"></p>
                </div>

                <div class="form-group">
                    <p id="Idispositivo"></p>
                </div>

                <div class="form-group">
                    <label id="lSerial"> Serial del dispositivo: </label>
                    <input type="text" class="form-control" id="serial" name="serial" placeholder="Igrese el N° del serial">
                </div>

                <div class="form-group">
                    <label id="lMaterial"> Materiales usados: </label>
                    <textarea class="form-control" name="material" id="material" cols="30" rows="4"></textarea>
                </div>
            </form>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-success" id="registrarInstalacion">Guardar</button>
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
                    <textarea class="form-control" name="vMmaterial" id="vMmaterial" cols="30" rows="5"></textarea>
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