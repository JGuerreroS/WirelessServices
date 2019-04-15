<!-- Modal registrar usuarios-->
<div class="modal fade" id="registrarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingrese los datos del usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmRegistarUsuario">

                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            placeholder="Ingrese su nombre" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su e-mail"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Privilegios de la cuenta</label>
                        <select class="select2 form-control custom-select" name="privilegio" id="privilegio" required>
                            <option value="">Seleccione</option>
                            <option value="1">Usuario administrador</option>
                            <option value="2">Usuario común</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-6">

                            <label>Contraseña</label>
                            <input type="password" autofocus="autofocus" class="form-control" id="pass1" name="pass1"
                                placeholder="Ingrese su contraseña" required>

                        </div>

                        <div class="col-6">

                            <label>Repetir contraseña</label>
                            <input type="password" class="form-control" id="pass2" name="pass2"
                                placeholder="Repetir contraseña" required>

                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="enviar" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal ver detalles de usuarios -->
<div class="modal fade" id="verUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Ver más detalles y/o editar </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <br>

            <form id="frmEditarUsuario">

                <div class="card" style="width: 20rem; margin:auto">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">

                            <label>Nombre:</label>
                            <input type="text" class="form-control" name="vNombre" id="vNombre">

                        </li>

                        <li class="list-group-item">

                            <label>Usuario:</label>
                            <input type="text" class="form-control" name="vUsuario" id="vUsuario">
                            <input type="hidden" name="id_usuario" id="id_usuario">

                        </li>

                        <li class="list-group-item">

                            <label>Nivel de usuario:</label>
                            <select class="form-control form-control-sm" id="vNivel" name="vNivel">
                                <option value="1"> Usuario administrador </option>
                                <option value="2"> Usuario común </option>
                            </select>

                        </li>

                        <li class="list-group-item" id="vFecha"></li>

                    </ul>
                </div>

            </form>

            <br>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-warning" id="editarUsuario">Editar</button>
                <button type="button" class="btn btn-success" id="guardarUsuarioEditado">Guardar</button>
            </div>

        </div>
    </div>
</div>