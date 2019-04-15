<!-- Modal registrar plan -->
<div class="modal fade" id="otrosPlanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingrese los datos del plan de internet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmPlan">

                    <div class="form-group">
                        <label for="formGroupExampleInput">Nombre del plan</label>
                        <input type="text" class="form-control" id="plan" name="plan"
                            placeholder="Nombre del plan">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="guardarPlan" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Modelos -->
<div class="modal fade" id="otrosModeloModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar dispositivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmDispositivo">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Dispositivo</label>
                        <input type="text" class="form-control" id="dispositivo" name="dispositivo" placeholder="Dispositivo">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="guardarModelo" class="btn btn-primary">Guardar</button> 
            </div>
        </div>
    </div>
</div>

<!-- Modal patron-->
<!-- <div class="modal fade" id="otrosPatronModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar patron</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="controllers/registroPatron.php" method="post">

                    <div class="form-group">
                        <label for="formGroupExampleInput">Ingrese el patron</label>
                        <input type="text" class="form-control" id="patron" name="patron"
                            placeholder="Patron de color">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button> </form>
            </div>
        </div>
    </div>
</div> -->