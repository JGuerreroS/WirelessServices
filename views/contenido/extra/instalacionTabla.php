<table class="table table-striped table-bordered" id="myTabla">

    <thead>
        <tr>
            <th class="text-center">N°</th>
            <th class="text-center">Rut cliente</th>
            <th class="text-center">Dispositivo</th>
            <th class="text-center">Opciones</th>
        </tr>
    </thead>

    <tbody>

    <?php
        $nro=0;
        include '../../../models/clase.php';
        $datos = verAnimales();
        while ($ver = mysqli_fetch_array($datos)) { 
            $nro++;
    ?>
        <tr>
            <td> <?php echo $nro;?> </td>
            <td> <?php echo $ver[1];?> </td>
            <td> <?php echo $ver[2];?> </td>
            <td class="text-center">
                <span class="btn btn-success btn-sm">
                    <i class="icon-zoom-in"></i>
                </span>
            </td>
        </tr>

    <?php } mysqli_free_result($datos); ?>

    </tbody>
    
</table>