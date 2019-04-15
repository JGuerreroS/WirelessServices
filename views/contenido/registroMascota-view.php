<div class="card-header">
    Mascotas
</div>

<div class="card-body">

    <!-- Agregar aqui el contenido -->

    <!-- Button del modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registroMascotaModal">
        <span class="icon-pets"></span> Registrar mascota
    </button>

    <!-- Button de pdf -->
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="icon-file-pdf"></span> PDF
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="reporte" target="_blank">Reporte General</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#fecha">Reporte por fecha</a>
            </div>
        </div>
    </div>

    <hr>

    <div id="mascotasTabla"></div>

    <?php include 'extra/registroMascotaModal.php'; //Cargar Modal ?>

    <!-- Hasta aqui el contenido -->
</div>