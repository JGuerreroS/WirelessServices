    <div class="card-header">
        <b>Usuarios</b>
    </div>

    <div class="card-body">

        <!-- Agregar aqui el contenido -->

        <!-- Button del modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrarUsuarioModal">
            <span class="icon-user-plus"></span> Registrar Usuario
        </button>

        <hr>

        <div id="usuarioTabla"></div>

        <?php include 'extra/usuariosModal.php'; //Cargar Modal ?>

        <!-- Hasta aqui el contenido -->
    </div>