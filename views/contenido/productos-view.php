    <div class="card-header">
    Productos
    </div>

    <div class="card-body">

        <!-- Button para abrir modal de Agregar categoria -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCategoria">
        Agregar categoria
        </button>

        <!-- Button para abrir modal de Agregar producto -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalProducto">
        Agregar producto
        </button>

        <hr>
        
        <!-- Agregar aqui el contenido -->
        <table class="table table-striped table-bordered" id="myTabla">

            <thead>
                <tr>
                    <th>N°</th>
                    <th>Categoria</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            <tbody>
            <?php
                require_once './controllers/productosControlador.php';
                $productos = new ProductosControlador();
                $datos = $productos->obtenerProductosControlador();
                $nro=0;
                while($ver = mysqli_fetch_array($datos)){
                    $nro++;
            ?>
                <tr>
                    <td> <?php echo $nro; ?> </td>
                    <td> <?php echo $ver[1]; ?> </td>
                    <td> <?php echo $ver[2]; ?> </td>
                    <td> <?php echo $ver[3]; ?> </td>
                    <td class="botones_tabla">
                        <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#m_edit" title="Ver más" onClick="editarProducto('<?php echo $ver[0]; ?>')">
                            <span class="icon-plus"></span>
                        </span>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
            
        </table>
    <?php include_once 'productos-modal.php'; ?>
    <!-- Hasta aqui el contenido -->
    </div>

    