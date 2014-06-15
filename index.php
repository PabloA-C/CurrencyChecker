<<!DOCTYPE HTML>

<html lang="en">
	<head>
		<title>Currency Checker</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=1040" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600|Arvo:700" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>

		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
	</head>
	<body class="homepage">
		<!-- Header Wrapper -->
		<div id="header-wrapper">

			<!-- Header -->
			<div id="header" class="container">

				<!-- Logo -->
				<h1 id="logo"><a href="#">Currency Checker</a></h1>
				<p>
					An easy way to check exchange rates
				</p>

			</div>

		</div>

		<!-- Features Wrapper -->
		<div id="features-wrapper">

			<!-- Features -->

			<section id="features" class="container">

				<?php

				$xml = simplexml_load_file("data.xml");

				echo("

<header>
<div class='currency'>
<h2> 1 <Strong>	<a  class='fa fa-bar-chart-o'><span> $xml->base</span></a></strong>  is worth:</h2>

</div>

</header>
");

				echo '<div class="row">';

				for ($counter = 0; $counter < 3; $counter += 1) {

					echo '	<div class="4u">
<!-- Feature -->
<section>
<div  class="rate1">
<ul> ';

					$cont = 1;
					foreach ($xml->children() as $child) {

						if ($child -> getName() != "base") {

							$min = 0;
							$max = 31;

							if ($counter == 1) {
								$min = 30;
								$max = 61;
							}

							if ($counter == 2) {
								$min = 61;
								$max = 92;
							}

							if ($cont > $min && $cont < $max) {

								$currency = $child -> currency;

								$value = $child -> value;

								echo("
<form method='post' action='changeBase.php'>
<input type='hidden' name='currency' value='$currency' >
<input type='hidden' name='value' value='$value' >
<button class='buttonCustom' type='submit'>$value  $currency</button>
</form>

");

							}

							$cont++;
						}
					}

					echo '	</ul>
</div>
</section>
</div>';

				}
				?>

				

				</div>

<section id="save" class="container">
				<ul class="actions">
				<li>

				<form method='post' action='getPDF.php'>
				<button class='buttonCustom' type='submit'>Export selection as PDF</button>

				</li>
				</ul>
				</section>

				<div id="features-wrapper">

					<!-- Features -->
					<section id="features" class="container">
						<header>
							<h2>About Currency Checker</h2>
						</header>

						<div class="row">
							<div class="4u">

								<!-- Feature -->
								<section>
									<a href="" class="image image-full"><img src="images/pic01.jpg" alt="" /></a>
									<header>
										<h3>Application purpose</h3>
									</header>
									<p>
										This is <strong>Currency Checker</strong>, a web application that provides users an easy way to check currency exchange rates. This application is an assigment for the Modern Content Management Technologies course.
								</section>

							</div>
							<div class="4u">

								<!-- Feature -->
								<section>
									<a href="" class="image image-full"><img src="images/pic02.jpg" alt="" /></a>
									<header>
										<h3>About me</h3>
									</header>
									<p>
										I'm Pablo Arjonilla, a Computer Science erasmus student on Łódź, Poland.
									</p>
								</section>
							</div>
							<div class="4u">

								<!-- Feature -->
								<section>
									<a href="" class="image image-full"><img src="images/pic03.jpg" alt="" /></a>
									<header>
										<h3>Why a web application?</h3>
									</header>
									<p>
										Web applications are the best way to reach users around the world. HTML, PHP and Javascript provide us powerful tools to work with XML and XSLT, and make it look good at the same time!
									</p>
								</section>

							</div>
						</div>

					</section>

				</div>

	</body>
</html>