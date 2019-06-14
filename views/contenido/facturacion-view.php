    <div class="card-header">
        <b>Registrar pago de facturas</b>
    </div>

    <div class="card-body">

        <!-- Agregar aqui el contenido -->

        <div class="row">
            <div class="col-4">
                <form id="frmSaveFactura">

                    <div class="form-group">
                        <label>Seleccione cliente</label>
                        <select class="custom-select" name="sCliente" id="sCliente">
                        <!-- <select class="js-example-basic-single" name="sCliente" id="sCliente"> -->
                            <option value="">Seleccione cliente</option>
                            <?php
                                include 'core/conexion.php';
                                $sql = "SELECT id, CONCAT(rut, ' ', nombre, ' ' , apellidos) AS cliente, id_plan FROM clientes WHERE id_estatus = 1 ORDER BY cliente";
                                $result = mysqli_query($conn,$sql);
                                while($row = mysqli_fetch_array($result)){ ?>
                                    <option value="<?php echo $row[0]."-".$row[2]; ?>"> <?php echo $row[1] ?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Referencia de pago</label>
                        <input type="text" name="referencia" id="referencia" class="form-control" placeholder="Referencia de pago">
                    </div>

                    <div class="form-group">
                        <label>Fecha de pago</label>
                        <input type="date" name="fPago" id="fPago" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Total pagado</label>
                        <input type="number" name="tPago" id="tPago" class="form-control" placeholder="Monto cancelado" min="1">
                    </div>

                    <button type="submit" class="btn btn-success" id="guardarFactura">Guardar</button>
                    
                </form>

            </div>

            <div class="col-8">

                <div id="facturacionTabla"></div>

            </div>
        </div>

        

        <?php include 'extra/usuariosModal.php'; //Cargar Modal ?>

        <!-- Hasta aqui el contenido -->
    </div>