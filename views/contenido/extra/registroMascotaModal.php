<!-- Modal registro mascotas -->
<div class="modal fade" id="registroMascotaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog" style="max-width: 800px !important;" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar mascota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="container">

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Datos de la mascota</h4>

                                <form id="frmRegistroMascota" enctype="multipart/form-data" method="post">

                                    <div class="form-group">
                                        <label>Microchip</label>
                                        <input type="text" id="micro" name="micro" class="form-control"
                                            placeholder="Microchip" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" id="nombre" name="nombre" class="form-control"
                                            placeholder="Nombre" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="position-top-right">Especie</label>
                                        <select class="select2 form-control custom-select" id="especie" name="especie"
                                            required>
                                            <option value="">Seleccione</option>
                                            <?php 
                                                include 'core/conexion.php';
                                                $sql = "select id, nombre from especies";
                                                $result = mysqli_query($conn,$sql);
                                                while ($ver = mysqli_fetch_array($result)) { 
                                            ?>

                                            <option value="<?php echo $ver[0]; ?>"> <?php echo $ver[1]; ?> </option>

                                            <?php } mysqli_free_result($result); mysqli_close($conn); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <select class="select2 form-control custom-select" name="sexo" id="sexo"
                                            required>
                                            <option value="">Seleccione</option>
                                            <option value="1">Macho</option>
                                            <option value="2">Hembra</option>
                                        </select>
                                    </div>
                                    <label>Fecha de nacimiento</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="nacimiento" name="nacimiento"
                                            required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="position-top-right">Raza</label>
                                        <select class="select2 form-control custom-select" id="raza" name="raza"
                                            required>
                                            <option value="">Seleccione...</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Color</label>
                                        <select class="select2 form-control custom-select" id="color" name="color"
                                            required>
                                            <option value="">Seleccione</option>
                                            <?php 
                                                include 'core/conexion.php';
                                                $sql = "select id_color, color from colores";
                                                $result = mysqli_query($conn,$sql);
                                                while ($ver = mysqli_fetch_array($result)) {
                                            ?>

                                            <option value="<?php echo $ver[0]; ?>"> <?php echo $ver[1]; ?> </option>

                                            <?php } mysqli_free_result($result); mysqli_close($conn); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Patron</label>
                                        <select class="select2 form-control custom-select" id="patron" name="patron"
                                            required>
                                            <option value="">Seleccione</option>
                                            <?php
                                                include 'core/conexion.php';
                                                $sql = "SELECT id_patron, patron FROM patron_color order by patron";
                                                $result = mysqli_query($conn,$sql);
                                                while ($ver = mysqli_fetch_array($result)) {
                                            ?>

                                            <option value="<?php echo $ver[0]; ?>"> <?php echo $ver[1]; ?> </option>

                                            <?php } mysqli_free_result($result); ?>
                                        </select>
                                    </div>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="container">

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Información adicional</h4>
                                <div class="form-group">
                                    <label>Propietario</label>
                                    <select class="select2 form-control custom-select" id="dueno" name="dueno" required>
                                        <option value="">Seleccione</option>
                                        <?php
                                                $sql1 = "SELECT id, CONCAT(run, ' ' , nombre, ' ', apellidos) as propietario FROM clientes order by propietario";
                                                $result1 = mysqli_query($conn,$sql1);
                                                while ($v = mysqli_fetch_array($result1)) {
                                            ?>

                                        <option value="<?php echo $v[0]; ?>"> <?php echo $v[1]; ?> </option>

                                        <?php } mysqli_free_result($result1); mysqli_close($conn); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Certificado Veterinario</label>
                                    <div class="custom-file">
                                        <input type="file" id="certificado" name="certificado" size="20"
                                            class="custom-file-input" required>
                                        <label class="custom-file-label"
                                            style="background-color: #0cb876; color: white">
                                            <span class="icon-plus"></span>
                                            Certificado Veterinario
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Esterilizado</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="opcion" name="opcion" value="1"
                                            required>
                                        <label>
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="opcion" name="opcion" value="2"
                                            required>
                                        <label>
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Razón de tenencia</label>
                                    <select class="select2 form-control custom-select" name="razon" id="razon" required>
                                        <option value="">Seleccione</option>
                                        <?php
                                                include 'models/clase.php';
                                                $razon = verRazon();
                                                while ($mostrar = mysqli_fetch_array($razon)) {
                                            ?>

                                        <option value="<?php echo $mostrar[0]; ?>"> <?php echo $mostrar[1]; ?> </option>

                                        <?php } ?>
                                    </select>
                                </div>
                                <label>Modo de obtención</label>
                                <div class="input-group">
                                    <select class="select2 form-control custom-select" name="modo" id="modo" required>
                                        <option value="">Seleccione</option>
                                        <?php
                                                $obtencion = verObtencion();
                                                while ($mos = mysqli_fetch_array($obtencion)) {
                                            ?>

                                        <option value="<?php echo $mos[0]; ?>"> <?php echo $mos[1]; ?> </option>

                                        <?php } ?>
                                    </select>
                                </div>
                                <label class="m-t-15">Calidad del responsable</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="calidad" name="calidad" required>
                                    <label class="custom-file-label" style="background-color: #0cb876; color: white">
                                        <span class="icon-plus"></span>
                                        Calidad del responsable
                                    </label>
                                </div>
                            </div>

                            </form>

                        </div>

                    </div>
                </div>

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="btn-registrarMascota" class="btn btn-success">Guardar</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal ver detalles de mascotas -->
<div class="modal fade" id="verMascotas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog" style="max-width: 700px !important;" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Ver más detalles y/o editar </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <br>

            <div class="row" style="margin: auto">
                <div class="col-6">

                    <form id="frmEditMascota">

                        <div class="card" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">

                                    <label>Nombre:</label>
                                    <input type="text" class="form-control" name="rNombre" id="rNombre">

                                </li>

                                <li class="list-group-item">

                                    <label>Microchip:</label>
                                    <input type="text" class="form-control" name="rMicrochip" id="rMicrochip">
                                    <input type="hidden" name="id_mascota" id="id_mascota">

                                </li>

                                <li class="list-group-item">

                                    <label>Especie:</label>
                                    <select class="select2 form-control custom-select" id="rEspecie" name="rEspecie">
                                        <option value="">Seleccione</option>
                                        <?php
                                        include 'core/conexion.php';
                                        $sql = "select id, nombre from especies";
                                        $result = mysqli_query($conn,$sql);
                                        while ($ver = mysqli_fetch_array($result)) {
                                    ?>

                                        <option value="<?php echo $ver[0]; ?>"> <?php echo $ver[1]; ?> </option>

                                        <?php } mysqli_free_result($result); mysqli_close($conn); ?>
                                    </select>

                                </li>

                                <li class="list-group-item">

                                    <label>Raza:</label>
                                    <select class="select2 form-control custom-select" id="rRaza" name="rRaza">
                                        <option value="">Seleccione</option>
                                        <?php
                                        include 'core/conexion.php';
                                        $sql = "select id, nombre from razas";
                                        $result = mysqli_query($conn,$sql);
                                        while ($ver = mysqli_fetch_array($result)) {
                                    ?>

                                        <option value="<?php echo $ver[0]; ?>"> <?php echo $ver[1]; ?> </option>

                                        <?php } mysqli_free_result($result); mysqli_close($conn); ?>
                                    </select>

                                </li>

                                <li class="list-group-item">

                                    <label>Sexo:</label>
                                    <select class="select2 form-control custom-select" name="rSexo" id="rSexo">
                                        <option value="">Seleccione</option>
                                        <option value="1">Macho</option>
                                        <option value="2">Hembra</option>
                                    </select>

                                </li>

                                <li class="list-group-item">

                                    <a id="rCertificado" target="_blank">Certificado veterinario</a>

                                </li>

                                <li class="list-group-item">

                                    <a id="rCalidad" target="_blank">Calidad del responsable</a>

                                </li>

                            </ul>
                        </div>

                </div>

                <div class="col-6">

                    <div class="card" style="width: 18rem;">
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item">

                                <label>Esterilizado:</label>
                                <select class="select2 form-control custom-select" name="rEsterilizado"
                                    id="rEsterilizado">
                                    <option value="">Seleccione</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>

                            </li>

                            <li class="list-group-item">

                                <label>Fecha de nacimiento:</label>
                                <input type="date" class="form-control" name="rNacimiento" id="rNacimiento">

                            </li>

                            <li class="list-group-item">

                                <label>Color:</label>
                                <select class="select2 form-control custom-select" id="rColor" name="rColor">
                                    <option value="">Seleccione</option>
                                    <?php
                                        include 'core/conexion.php';
                                        $sql = "select id_color, color from colores";
                                        $result = mysqli_query($conn,$sql);
                                        while ($ver = mysqli_fetch_array($result)) {
                                    ?>

                                    <option value="<?php echo $ver[0]; ?>"> <?php echo $ver[1]; ?> </option>

                                    <?php } mysqli_free_result($result); mysqli_close($conn); ?>
                                </select>

                            </li>

                            <li class="list-group-item">

                                <label>Patron:</label>
                                <select class="select2 form-control custom-select" id="rPatron" name="rPatron">
                                    <option value="">Seleccione</option>
                                    <?php
                                        include 'core/conexion.php';
                                        $sql = "select id_patron, patron from patron_color";
                                        $result = mysqli_query($conn,$sql);
                                        while ($ver = mysqli_fetch_array($result)) {
                                    ?>

                                    <option value="<?php echo $ver[0]; ?>"> <?php echo $ver[1]; ?> </option>

                                    <?php } mysqli_free_result($result); mysqli_close($conn); ?>
                                </select>

                            </li>

                            <li class="list-group-item">

                                <label>Dueño:</label>
                                <select class="select2 form-control custom-select" id="rPropietario"
                                    name="rPropietario">
                                    <option value="">Seleccione</option>
                                    <?php
                                        include 'core/conexion.php';
                                        $sql = "SELECT id, CONCAT(run, ' ' , nombre, ' ', apellidos) as propietario FROM clientes order by propietario";
                                        $result = mysqli_query($conn,$sql);
                                        while ($ver = mysqli_fetch_array($result)) {
                                    ?>

                                    <option value="<?php echo $ver[0]; ?>"> <?php echo $ver[1]; ?> </option>

                                    <?php } mysqli_free_result($result); mysqli_close($conn); ?>
                                </select>
                                </form>
                            </li>

                            <li class="list-group-item" id="rUsuario"></li>

                            <li class="list-group-item" id="rFechaRegistro"></li>

                        </ul>
                    </div>

                </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-warning" id="editarMascota">Editar</button>
                <button type="button" class="btn btn-success" id="guardarEdicionMascota">Guardar</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal fechas de reporte -->
<div class="modal fade" id="fecha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Selecciona las fechas </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <br>

            <div class="row" style="margin: auto">
                <div class="col-12">

                    <form method="post" action="reporte" target="_blank">
                        <label>Desde</label>
                        <input type="date" name="desde" id="desde">
                        <label>Hasta</label>
                        <input type="date" name="hasta" id="hasta">
                    

                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" id="generarReporte">Generar</button></form>
            </div>

        </div>
    </div>
</div>