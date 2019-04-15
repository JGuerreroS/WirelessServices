<label for="id_categoria">Categoria</label>
<select class="form-control" id="id_categoria" name="id_categoria">
    <option>Seleccione</option>
    <?php
    include './controllers/productosControlador.php';
    $productos = new ProductosControlador();
    $datos = $productos->selectCategoriaControlador();
    while($row = mysqli_fetch_array($datos)){
    ?>

    <option value="<?php echo $row['0']; ?>"> <?php echo $row['1']; ?> </option>

    <?php } ?>
</select>