<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style1.css" />
		<script src="/loader.js"></script>

		<title>IMAGEBOX</title>
	</head>
	<body>

		<div id="startpanel">
			<?php
			
			unlink ("data.pdf");
			
			require('fpdf.php');


class PDF extends FPDF
{
	
	

	
	
// Cabecera de página
function Header()
{
	
	$base = simplexml_load_file("base.xml");

	$currency =  $base->base;
	
    // Logo
    $this->Image('images/pic01.jpg',140,10,60);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(10,30, $currency." exchange rates." ,3,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Helvetica','',11);

$base = simplexml_load_file("base.xml");



foreach ($base->children() as $child) {

						if ($child -> getName() != "base") {
							
					
							
							$currency = $child -> currency;

								$value = $child -> value;
								
							
								  $pdf->Cell(40,5, $value." ".$currency,3,1);
							
								
						
								  
						}
}


  



$pdf->Output("data.pdf")


?>

			<?php

			header('Location: data.pdf');
			?>
		</div>

	</body>
</html>