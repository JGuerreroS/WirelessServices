<div class="row">

    <div class="col-sm-4">

        <table class="table table-striped table-bordered">

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

    <div class="col-sm-4">

        <table class="table table-striped table-bordered">

            <thead>
                <tr>
                    <th class="text-center">N°</th>
                    <th class="text-center">Modelo</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $nro=0;
                $dispositivos = verDispositivos();
                while ($ver = mysqli_fetch_array($dispositivos)) { $nro++;
                ?>
                    
                <tr>
                    <td class="text-center"> <?php echo $nro;?> </td>
                    <td> <?php echo $ver[0];?> </td>

                </tr>

                <?php } mysqli_free_result($dispositivos); ?>

            </tbody>

        </table>

    </div>

</div>