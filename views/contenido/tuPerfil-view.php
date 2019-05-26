    <div class="card-header">
        <b> Datos personales </b>
    </div>

    <div class="card-body">

        <!-- Agregar aqui el contenido -->

        <div class="card p-3">
            <div class="row">
                <div class="col-6">
                    <label>Rut:</label>
                    <p id="perfilRut"></p>
                    <label>Nombres:</label>
                    <p id="perfilNombre"></p>
                    <label>Apellidos:</label>
                    <p id="perfilApellidos"></p>
                    <label>Teléfono:</label>
                    <p id="perfilTelefono"></p>
                    <label>Correo:</label>
                    <p id="perfilEmail"></p>
                    <label>Dirección de residencia:</label>
                    <p id="perfilResidencia"></p>
                    <button type="button" class="btn btn-warning" id="editarPerfil">Editar tus datos</button>
                </div>

                <div class="col-6">

                    <form id="frmEditProfile">

                        <input type="hidden" name="IperfilRut" id="IperfilRut">

                        <div class="row InputPerfil">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nombres:</label>
                                    <input class="form-control" type="text" name="IperfilNombre" id="IperfilNombre" placeholder="Nombres">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Apellidos:</label>
                                    <input class="form-control" type="text" name="IperfilApellidos" id="IperfilApellidos" placeholder="Apellidos">
                                </div>
                            </div>
                        </div>

                        <div class="row InputPerfil">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Teléfono:</label>
                                    <input class="form-control" type="text" name="IperfilTelefono" id="IperfilTelefono" placeholder="Teléfono">
                                </div>
                            </div>

                            <div class="col-8">
                                <div class="form-group">
                                    <label>Correo:</label>
                                    <input class="form-control" type="text" name="IperfilEmail" id="IperfilEmail" placeholder="Email">
                                </div>
                            </div>
                        </div>

                        <div class="form-group InputPerfil">
                            <label>Residencia:</label>
                            <textarea class="form-control" name="IperfilResidencia" id="IperfilResidencia" rows="2" placeholder="Residencia"></textarea>
                        </div>
                    </form>
                    
                    <form id="frmEditPass">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Contraseña actual:</label>
                                    <input type="password" name="passActual" id="passActual" class="form-control" placeholder="Clave actual">
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                <label>Nueva contraseña:</label>
                                <input type="password" name="passNew1" id="passNew1" class="form-control" placeholder="Nueva clave">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label>Repetir contraseña:</label>
                                    <input type="password" name="passNew2" id="passNew2" class="form-control" placeholder="Repetir clave">
                                </div>
                            </div>
                        </div>
                    </form>

                    <button type="button" class="btn btn-warning" id="SaveChangesUpdateUser">Guardar cambios</button>
                    <button type="button" class="btn btn-warning" id="SaveChangesPass">Guardar contraseña</button>
                    <button type="button" class="btn btn-danger" id="ChangePass">Cambiar contraseña</button>
                    <button type="button" class="btn btn-primary" id="NotEditClient">No editar</button>
                    <button type="button" class="btn btn-primary" id="NotEditPass">No editar</button>

                </div>
            </div>
        </div>

        <!-- Hasta aqui el contenido -->
    </div>