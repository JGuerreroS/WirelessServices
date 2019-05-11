<div class="card-header">
    <b>Clientes</b>
</div>

<div class="card-body">

    <!-- Agregar aqui el contenido -->

    <!-- Button del modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        <span class="icon-user-plus"></span> Registrar cliente
    </button>

    <!-- Button generar pdf de todos los clientes -->
    <a href="reporteClientes" target="_blank" class="btn btn-secondary" title="Generar reporte PDF de todos los clientes">
        <span class="icon-document-file-pdf"></span> PDF
    </a>

    <hr>

    <div id="clienteTabla"></div>

    <?php include 'extra/clienteModal.php'; //Cargar Modales ?>

    <!-- Hasta aqui el contenido -->
</div>