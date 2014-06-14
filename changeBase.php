<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style1.css" />
		<title>IMAGEBOX</title>
	</head>
	<body>

		<div id="startpanel">
			<?php
			
			

			

			$newCurrency = $_POST['currency'];
			$newValue = $_POST['value'];

			$xml = new DOMDocument('1.0');

			$xmlTag = $xml -> createElement("xml");
			$xml -> appendChild($xmlTag);

			$base = $xml -> createElement("base");
			$xml -> appendChild($base);
			$base_value = $xml -> createTextNode($newCurrency);
			$base -> appendChild($base_value);

			$xmlTag -> appendChild($base);

			$data = simplexml_load_file("data.xml");

			foreach ($data->children() as $child) {

				if ($child -> getName() != "base") {

					$item = $xml -> createElement("item");
					$xml -> appendChild($item);

					$currency = $xml -> createElement("currency");

					$currency_value = $xml -> createTextNode($child -> currency);

					$currency -> appendChild($currency_value);
					$item -> appendChild($currency);

					$val = $xml -> createElement("value");

					$val_value = $xml -> createTextNode(substr($child -> value, 0, 8));

					$val -> appendChild($val_value);
					$item -> appendChild($val);
					$xmlTag -> appendChild($item);
				}
			}

		
			$xml->save("data.xml");

			header('Location: index.php');
			?>
		</div>

	</body>
</html>