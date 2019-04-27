<!-- Modal especie-->
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

<!-- Modal raza-->
<div class="modal fade" id="modalRaza" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registrar raza</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="controllers/registroRaza.php" method="post">
            
                <div class="form-group">
                    <label for="formGroupExampleInput">Especie</label>
                    <select class="form-control form-control-sm" id="especie" name="especie">
                        <option value=""> Seleccione especie </option>
                        <?php
                            include 'core/conexion.php';
                            $sql = "select id, nombre from especies order by nombre";
                            $result = mysqli_query($conn,$sql);
                            while ($ver = mysqli_fetch_array($result)) {
                        ?>

                        <option value="<?php echo $ver[0]; ?>"> <?php echo $ver[1]; ?> </option>

                    <?php } mysqli_free_result($result); mysqli_close($conn); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput">Raza</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Nombre de la raza">
                </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button> </form>
        </div>
        </div>
    </div>
</div>