<?php
    require('public/lib/fpdf/fpdf.php');

    // error_reporting(0);

    $id_cliente = $_POST['Icliente'];

    class PDF extends FPDF{
    // Cabecera de página
    function Header(){
        // Logo
        $this->Image('public/img/9.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(70);
        // Título
        $this->Cell(50,30,utf8_decode('Perfil del cliente'),0,0,'C');
        // Salto de línea
        $this->Ln(30);
        // Cabecera de la tabla

    }

    // Pie de página
        function Footer(){
            // Posición:a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Título footer
            $this->Cell(30,10,'Municipalidad Graneros',0,0,'C');
            // Número de página
            $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    // Creación del objeto de la clase heredada
    $pdf = new PDF(); //'L','mm','A4'
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);

    include 'models/clase.php';

    $datos = perfilCliente($id_cliente);

    $pdf->SetFont('Arial','I',10);
    $pdf->Cell(32,10,'RUT:',0,0,'L',0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(50,10,$datos[2],0,1,'L',0);
    $pdf->SetFont('Arial','I',10);
    $pdf->Cell(32,10,'Nombres:',0,0,'L',0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(80,10,utf8_decode($datos[1]),0,1,'L',0);
    $pdf->SetFont('Arial','I',10);
    $pdf->Cell(32,10,utf8_decode('Teléfono:'),0,0,'L',0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(80,10,utf8_decode($datos[8]),0,1,'L',0);
    $pdf->SetFont('Arial','I',10);
    $pdf->Cell(32,10,'Correo:',0,0,'L',0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(80,10,utf8_decode($datos[9]),0,1,'L',0);
    $pdf->SetFont('Arial','I',10);
    $pdf->Cell(32,10,utf8_decode('Dirección:'),0,0,'L',0);
    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(160,10,utf8_decode($datos[5]),0);
    $pdf->SetFont('Arial','I',10);
    $pdf->Cell(32,10,'Fecha de registro:',0,0,'L',0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(40,10,str_replace('-', '/', date('d-m-Y', strtotime($datos[6]))),0,1,'L',0);
    $pdf->SetFont('Arial','I',10);
    $pdf->Cell(32,10,utf8_decode('Estatus:'),0,0,'L',0);
    $pdf->SetFont('Arial','B',10);
    if($datos[10] == 1){
        $pdf->Cell(40,10,'ACTIVO',0,1,'L',0);
        $pdf->SetFont('Arial','I',10);
        $pdf->Cell(32,10,utf8_decode('Día de pago:'),0,0,'L',0);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(40,10,$datos[7],0,1,'L',0);

        $pdf->SetFont('Arial','I',10);
        $pdf->Cell(32,10,'Dispositivo:',0,0,'L',0);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(40,10,utf8_decode($datos[4]),0,1,'L',0);

        $pdf->SetFont('Arial','I',10);
        $pdf->Cell(32,10,'Plan:',0,0,'L',0);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(40,10,utf8_decode($datos[3]),0,1,'L',0);

        $pdf->SetFont('Arial','I',10);
        $pdf->Cell(32,10,'Costo del plan:',0,0,'L',0);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(40,10,utf8_decode($datos[11]." Pesos"),0,1,'L',0);
    }else{
        $pdf->Cell(40,10,'INACTIVO',0,1,'L',0);
    }

    

    
    
    
    
    
    
    
    $pdf->Output();
?>