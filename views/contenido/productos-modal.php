<!-- Modal Agregar categoria -->
<div class="modal fade" id="ModalCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="frmCategoria">
            <div class="form-group">
                <label for="categoria">Nombre de la categoria</label>
                <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Nombre de la categoria">
            </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="saveCategoria">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Agregar producto -->
<div class="modal fade" id="ModalProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="frmNewProducto">

            <div class="form-group">
              <label for="id_categoria">Categoria</label>
              <select class="form-control" id="id_categoria" name="id_categoria">
                  <option>Seleccione</option>
                  <?php
                  require_once './controllers/productosControlador.php';
                  $productos = new ProductosControlador();
                  $datos = $productos->selectCategoriaControlador();
                  while($row = mysqli_fetch_array($datos)){
                  ?>

                  <option value="<?php echo $row['0']; ?>"> <?php echo $row['1']; ?> </option>

                  <?php } ?>
              </select>
            </div>
            
            <div class="form-group">
                <label for="producto">Nombre del producto</label>
                <input type="text" class="form-control" id="producto" name="producto" placeholder="Nombre del producto">
            </div>

            <div class="form-group">
                <label for="producto">Precio del producto</label>
                <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio del producto" step="0.1">
            </div>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="saveNewProducto">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Editar producto -->
<div class="modal fade" id="ModalEditProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="frmEditProducto">

            <div class="form-group">
              <label for="id_categoria">Categoria</label>
              <select class="form-control" id="id_categoria" name="id_categoria">
                  <option>Seleccione</option>
                  <?php
                  require_once './controllers/productosControlador.php';
                  $productos = new ProductosControlador();
                  $datos = $productos->selectCategoriaControlador();
                  while($row = mysqli_fetch_array($datos)){
                  ?>

                  <option value="<?php echo $row['0']; ?>"> <?php echo $row['1']; ?> </option>

                  <?php } ?>
              </select>
            </div>
            
            <div class="form-group">
                <label for="producto">Nombre del producto</label>
                <input type="text" class="form-control" id="producto" name="producto" placeholder="Nombre del producto">
            </div>

            <div class="form-group">
                <label for="producto">Precio del producto</label>
                <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio del producto" step="0.1">
            </div>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="saveNewProducto">Guardar</button>
      </div>
    </div>
  </div>
</div>