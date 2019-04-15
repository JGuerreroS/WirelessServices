<?php
$especie = strtoupper(trim($_POST['especie']));

include '../models/clase.php';

registroEspecie($especie);

header('Location: ../especies');
?>