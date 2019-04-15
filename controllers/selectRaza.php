<?php

include '../core/conexion.php';

$especie = $_GET['id_especie']; //Nombre de la región

$sql = "select id, nombre from razas where id_especie=$especie";

$result = mysqli_query($conn,$sql);

$html = "<option value=''>Raza...</option>";

while($row = mysqli_fetch_array($result)){
	$html.= "<option value='".$row[0]."'>".$row[1]."</option>";
}

mysqli_free_result($result);

mysqli_close($conn);

echo $html;
?>