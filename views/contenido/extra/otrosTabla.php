<div class="row">

    <div class="col-sm-7">

        <table class="table table-striped table-bordered" id="myTabla">

            <thead>
                <tr>
                    <th class="text-center">N°</th>
                    <th class="text-center">Planes de internet</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $nro=0;
                include '../../../models/clase.php';
                $planes = verPlanes();
                while ($ver = mysqli_fetch_array($planes)) { $nro++;
                ?>
                    
                <tr>
                    <td class="text-center"> <?php echo $nro;?> </td>
                    <td> <?php echo $ver[1];?> </td>

                </tr>

                <?php } mysqli_free_result($planes); ?>

            </tbody>

        </table>

    </div>

</div>

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