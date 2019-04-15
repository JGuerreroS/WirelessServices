<?php
include 'models/clase.php';
$datos = verAnimales();
?>

<table class="table table-striped table-bordered" id="myTabla">

    <thead>
        <tr>
            <th class="text-center">N°</th>
            <th class="text-center">Especie</th>
            <th class="text-center">Raza</th>
        </tr>
    </thead>

    <tbody>

    <?php
    $nro=0;
    while ($ver = mysqli_fetch_array($datos)) { 
        $nro++;
    ?>
        <tr>
            <td> <?php echo $nro;?> </td>
            <td> <?php echo $ver[0];?> </td>
            <td> <?php echo $ver[1];?> </td>
        </tr>

    <?php } mysqli_free_result($datos); ?>

    </tbody>
    
</table>