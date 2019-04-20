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
                        <input type="text" class="form-control" id="plan" name="plan" placeholder="Nombre del plan">
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Costo del plan</label>
                        <input type="number" class="form-control" id="costoPlan" name="costoPlan" placeholder="Costo del plan">
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

<!-- Modal editar dispositivos -->
<div class="modal fade" id="otrosEditarDispositivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Dispositivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <label for="formGroupExampleInput">Ingrese el nuevo nombre</label>
                    <input type="text" class="form-control" id="dispositivoEditar" name="dispositivoEditar" placeholder="Nombre del dispositivo">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="guardarDispositivoEditado" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal editar planes -->
<div class="modal fade" id="otrosEditarPlanes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Planes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="frmEditarPlan">
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Editar nombre</label>
                                <input type="hidden" id="id_planH" name="id_planH">
                                <input type="text" class="form-control" id="planEditarNombre" name="planEditarNombre" placeholder="Nombre del plan">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Editar costo</label>
                                <input type="number" class="form-control" id="planEditarCosto" name="planEditarCosto" placeholder="Precio">
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="EditarPlan" class="btn btn-warning">Editar</button>
                <button type="button" id="guardarPlanEditado" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>