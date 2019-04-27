<?php
include '../../../core/conexion.php';
$sql = "SELECT fecha_instalacion, COUNT(id) FROM clientes GROUP BY fecha_instalacion ORDER BY fecha_instalacion";
$res = mysqli_query($conn,$sql);

$valX = array(); // Fecha
$valY = array(); // ID

while($row = mysqli_fetch_array($res)){
  $valX[] = $row[0]; //Fecha
  $valY[] = $row[1]; // Id
}

mysqli_free_result($res);
mysqli_close($conn);

$datosX = json_encode($valX);
$datosY = json_encode($valY);

?>

<div id="graficaLinea"></div>

<script>

  function crearCadenaLineal(json){
    var parsed = JSON.parse(json);
    var arr = [];
    for(var x in parsed){
      arr.push(parsed[x]);
    }
    return arr;
  }

  datosX = crearCadenaLineal('<?php echo $datosX; ?>');
  datosY = crearCadenaLineal('<?php echo $datosY; ?>');

  var data = [
    {
      x: datosX,
      y: datosY,
      type: 'scatter'
    }
  ];

  /*var layout = {
  title:'Solicitudes de experticia realizados',
  height: 550,
  font: {
    family: 'Lato',
    size: 16,
    color: 'red' //color de titulo central, y las fechas y cantidades en los ejes X Y
  },
  plot_bgcolor: '',
  margin: {
    pad: 10
  },
  xaxis: {
    title: 'Fecha',
    titlefont: {
      color: 'black',
      size: 12
    },
    rangemode: 'tozero'
  },
  yaxis: {
    title: 'Total de solicitudes',
    titlefont: {
      color: 'black',
      size: 12
    },
    rangemode: 'tozero'
  }
};*/

  Plotly.newPlot('graficaLinea', data/*, layout*/);

</script>