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
			require ('fpdf.php');

			$pdf = new FPDF('P','mm','A4');
			$pdf -> AddPage();
			$pdf -> SetFont('Arial', 'B', 16);
			$pdf -> Cell(40, 10, '¡Hola, Mundo!');
			$pdf -> Output("Data.pdf");
			
			?>
		</div>

	</body>
</html>