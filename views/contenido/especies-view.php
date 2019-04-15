<div class="card-header">
    Especies
</div>

<div class="card-body">

<!-- Agregar aqui el contenido -->

<!-- Button del modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEspecie">
    Registrar especie
</button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRaza">
    Registrar raza
</button>

<hr>

<?php
    include 'extra/registroEspecieTabla.php'; //Cargar Tabla
    include 'extra/registroEspecieModal.php'; //Cargar Modal
?>

<!-- Hasta aqui el contenido -->
</div>

    