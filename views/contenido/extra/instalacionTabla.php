<table class="table table-striped table-bordered" id="myTabla">

    <thead>
        <tr>
            <th class="text-center">N°</th>
            <th class="text-center">Rut cliente</th>
            <th class="text-center">Dispositivo</th>
            <th class="text-center">Serial</th>
            <th class="text-center">Opciones</th>
        </tr>
    </thead>

    <tbody>

    <?php
        $nro=0;
        include '../../../models/clase.php';
        $datos = verInstalaciones();
        while ($ver = mysqli_fetch_array($datos)) { 
            $nro++;
    ?>
        <tr>
            <td class="text-center"> <?php echo $nro;?> </td>
            <td class="text-center"> <?php echo $ver[1];?> </td>
            <td> <?php echo $ver[2];?> </td>
            <td class="text-center"> <?php echo $ver[3];?> </td>
            <td class="text-center">
                <span class="btn btn-success btn-sm" onclick="verInstalacion('<?php echo $ver[0]; ?>')" data-toggle="modal" data-target="#modalVerInstalacion" title="Ver más">
                    <i class="icon-zoom-in"></i>
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