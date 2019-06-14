<?php

    session_start();

    if($_SESSION['usuario']){

        require('public/lib/fpdf/fpdf.php');

        // error_reporting(0);

        class PDF extends FPDF{
        // Cabecera de página
        function Header(){
            // Logo
            $this->Image('public/img/9.png',30,8,33);
            // Arial bold 15
            $this->SetFont('Arial','I',10);
            // Título
            // Movernos a la derecha
            $this->Cell(110);
            $this->Cell(50,4,utf8_decode('Tecno Acosta'),0,1,'C');
            $this->Cell(110);
            $this->Cell(50,4,utf8_decode('Wireless Services'),0,1,'C');
            $this->Cell(110);
            $this->Cell(50,4,utf8_decode('NIT: '),0,1,'L');
            $this->Cell(110);
            $this->Cell(50,4,utf8_decode('Dirección: '),0,1,'L');
            $this->Cell(110);
            $this->Cell(50,4,utf8_decode('Teléfono: '),0,1,'L');
            $this->Cell(110);
            $this->Cell(50,4,utf8_decode('Correo: '),0,0,'L');
            $this->Ln(10);
            $this->Cell(110);
            $this->SetFont('Arial','B',15);
            $this->Cell(50,30,utf8_decode('Reporte de clientes'),0,0,'C');
            // Salto de línea
            $this->Ln(40);
            // Cabecera de la tabla
            $this->SetFont('Arial','B',10);
            $this->Cell(15,10,utf8_decode('N°'),1,0,'C',0);
            $this->Cell(25,10,'RUT',1,0,'C',0);
            $this->Cell(90,10,'Nombres',1,0,'C',0);
            $this->Cell(30,10,utf8_decode('Teléfono'),1,0,'C',0);
            $this->Cell(80,10,'Correo',1,0,'C',0);
            $this->Cell(30,10,'Fecha registro',1,1,'C',0);
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
        $pdf = new PDF('L','mm','A4'); //'L','mm','A4'
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times','',12);

        include 'models/clase.php';

        $datos = reporteClientes();

        $nro = 0;

        while ($row = mysqli_fetch_array($datos)) { $nro++;
            $pdf->Cell(15,10,$nro,1,0,'C',0);
            $pdf->Cell(25,10,$row[0],1,0,'C',0); // Rut
            $pdf->Cell(90,10,utf8_decode($row[1]),1,0,'L',0); // Nombres
            $pdf->Cell(30,10,utf8_decode($row[2]),1,0,'C',0); // Teléfono
            $pdf->Cell(80,10,utf8_decode($row[3]),1,0,'C',0); // Correo
            $pdf->Cell(30,10,str_replace('-', '/', date('d-m-Y', strtotime($row[4]))),1,1,'C',0); // Fecha
        }

        $pdf->Output();

        }else{

            header('Location: 404');
            
        }