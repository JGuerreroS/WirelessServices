<?php
    require('public/lib/fpdf/fpdf.php');

    error_reporting(0);

    $fechaDesde = $_POST['desde'];
    $fechaHasta = $_POST['hasta'];

    $fechas = array('desde' => $fechaDesde, 'hasta' => $fechaHasta);

    class PDF extends FPDF{
    // Cabecera de página
    function Header(){
        // Logo
        $this->Image('public/img/2.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(110);
        // Título
        $this->Cell(30,10,utf8_decode('Reporte de mascotas'),0,0,'C');
        // Salto de línea
        $this->Ln(30);
        // Cabecera de la tabla
        $this->SetFont('Arial','B',12);
        $this->Cell(10,10,utf8_decode('N°'),1,0,'C',0);
        $this->Cell(20,10,'Chip',1,0,'C',0);
        $this->Cell(45,10,'Nombre',1,0,'C',0);
        $this->Cell(22,10,'Especie',1,0,'C',0);
        $this->Cell(30,10,'Raza',1,0,'C',0);
        $this->Cell(15,10,'Sexo',1,0,'C',0);
        $this->Cell(30,10,'Nacimiento',1,0,'C',0);
        $this->Cell(80,10,'Propietario',1,1,'C',0);
    }

    // Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Título footer
        $this->Cell(30,10,utf8_decode('Municipalidad Graneros'),0,0,'C');
        // Número de página
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
    }

    // Creación del objeto de la clase heredada
    $pdf = new PDF('L','mm','A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);

    include 'models/clase.php';
    $datos = verMascotasReporte($fechas);
    $nro = 0;
    while ($ver = mysqli_fetch_array($datos)) { $nro++;

        $pdf->Cell(10,10,$nro,1,0,'C',0);
        $pdf->Cell(20,10,$ver[1],1,0,'C',0);
        $pdf->Cell(45,10,$ver[2],1,0,'C',0);
        $pdf->Cell(22,10,$ver[3],1,0,'C',0);
        $pdf->Cell(30,10,utf8_decode($ver[4]),1,0,'C',0);
        if($ver[5]==1){
            $pdf->Cell(15,10,'Macho',1,0,'C',0);
        }else{
            $pdf->Cell(15,10,'Hembra',1,0,'C',0);
        }
        $pdf->Cell(30,10,$ver[6],1,0,'C',0);
        $pdf->Cell(80,10,utf8_decode($ver[8]),1,1,'C',0);

    }
    
    $pdf->Output();
?>