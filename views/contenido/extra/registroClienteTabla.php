<table class="table table-striped table-bordered" id="myTabla">

    <thead>
        <tr>
            <th class="text-center">N°</th>
            <th class="text-center">Nombre y Apellidos</th>
            <th class="text-center">Rut</th>
            <th class="text-center">Plan</th>
            <th class="text-center">Dispositivo</th>
            <th class="text-center">Opciones</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th class="text-center">N°</th>
            <th class="text-center">Nombre y Apellidos</th>
            <th class="text-center">Rut</th>
            <th class="text-center">Plan</th>
            <th class="text-center">Dispositivo</th>
            <th class="text-center">Opciones</th>
        </tr>
    </tfoot>

    <tbody>

    <?php
        $nro=0;
        include '../../../models/clase.php';
        $datos = verClientes();
        while ($ver = mysqli_fetch_array($datos)) { $nro++; $id=$ver[0];
    ?>
        <tr>
            <td> <?php echo $nro; ?> </td>
            <td> <?php echo $ver[1]; ?> </td>
            <td class="text-center"> <?php echo $ver[2];?> </td>
            <td> <?php echo $ver[3];?> </td>
            <td> <?php echo $ver[4];?> </td>
            <td class="text-center">
                <span class="btn btn-success btn-sm" onClick="verMas('<?php echo $id; ?>')" data-toggle="modal" data-target="#m_verMas">
                    <span class="icon-zoom-in"></span>
                </span>

                <span class="btn btn-danger btn-sm" onClick="borrar('<?php echo $id; ?>')">
                    <span class="icon-bin"></span>
                </span>
            </td>
        </tr>

        <?php } mysqli_free_result($datos); ?>

    </tbody>

</table>

<script>
 $(document).ready(function () {
    // DataTables
    $('#myTabla').DataTable({
        language: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
                },
            "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    }); 
});
</script>