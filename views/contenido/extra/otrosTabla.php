<div class="row">

    <div class="col-sm-6">

        <table class="table table-striped table-bordered">

            <thead>
                <tr>
                    <th class="text-center">N°</th>
                    <th class="text-center">Planes de internet</th>
                    <th class="text-center">Costo</th>
                    <th class="text-center">Opciones</th>
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
                    <td> <?php echo $ver[2];?> </td>
                    <td class="text-center">
                        <span class="btn btn-success btn-sm" title="Editar" onclick="verMasPlanes('<?php echo $ver[0]; ?>')" data-toggle="modal" data-target="#otrosEditarPlanes">
                            <i class="icon-zoom-in"></i>
                        </span>

                        <span class="btn btn-danger btn-sm" title="Borrar" onclick="borrarPlanes('<?php echo $ver[0]; ?>')">
                            <i class="icon-bin"></i>
                        </span>
                    </td>

                </tr>

                <?php } mysqli_free_result($planes); ?>

            </tbody>

        </table>

    </div>

    <div class="col-sm-6">

        <table class="table table-striped table-bordered">

            <thead>
                <tr>
                    <th class="text-center">N°</th>
                    <th class="text-center">Modelo</th>
                    <th class="text-center">Opciones</th>
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
                    <td> <?php echo $ver[1]; ?> </td>
                    <td class="text-center">
                        <span class="btn btn-success btn-sm" title="Editar" onclick="editarDispositivo('<?php echo $ver[0]; ?>')" data-toggle="modal" data-target="#otrosEditarDispositivo">
                            <i class="icon-zoom-in"></i>
                        </span>
                        <span class="btn btn-danger btn-sm" title="Borrar" onclick="borrarDispositivo('<?php echo $ver[0]; ?>')">
                            <i class="icon-bin"></i>
                        </span>
                    </td>

                </tr>

                <?php } mysqli_free_result($dispositivos); ?>

            </tbody>

        </table>

    </div>

</div>