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
		<!--   <script src="js/loader.js"></script>-->
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
	</head>
	<body class="homepage">
		<ul>

			<!--<li OnClick="change('EUR');">
			&#160&#160&#160EUR
			</li> -->

		</ul>

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

			<nav id="nav">
				<ul>

					<li>

						<a href="" class="fa fa-bar-chart-o"><span>Select a currency</span></a>
						<ul>

							<!--	<li OnClick="change('EUR');">
							&#160&#160&#160EUR
							</li> -->

						</ul>

					</li>

				</ul>
			</nav>
			<!-- Features -->

			<section id="features" class="container">

				<header>
					<div class="currency">
						<h2>1<Strong> Eur </strong> is worth:</h2>
					</div>

				</header>

				<div class="row">

					<?php
					$xml = simplexml_load_file("data.xml");

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
									$max = 100;
								}

								if ($cont > $min && $cont < $max) {	$value;

									$value = "";
									$currency = "";

									foreach ($child->children() as $child) {

										if ($child -> getName() == "currency") {

											$currency = $child;

										}

										if ($child -> getName() == "value") {

											$value = $child;

										}

									}

									$value = substr($value, 0, 8);

									echo(" <form method='post' action='upvote.php'>

<input type='hidden' name='value' value='$currency' >
<input type='hidden' name='vae' value='$value' >
<button type='submit' class='buttonCustom'> $value $currency </button>

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

					<section id="save" class="container">
						<ul class="actions">
							<li>
								<a href="#" class="button button-icon fa fa-file"  OnClick="save();">Export selection as PDF</a>

							</li>
						</ul>
					</section>

				</div>

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
									<a href="http://regularjane.deviantart.com/art/Old-Reads-363428235" class="image image-full"><img src="images/pic01.jpg" alt="" /></a>
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
									<a href="http://regularjane.deviantart.com/art/Nutella-359114563" class="image image-full"><img src="images/pic02.jpg" alt="" /></a>
									<header>
										<h3>About me</h3>
									</header>
									<p>
										My name is Pablo Manuel Arjonilla Cobreros, I'm an Computer Science erasmus student on Łódź, Poland.
									</p>
								</section>

							</div>
							<div class="4u">

								<!-- Feature -->
								<section>
									<a href="http://regularjane.deviantart.com/art/Solo-Spring-358679786" class="image image-full"><img src="images/pic03.jpg" alt="" /></a>
									<header>
										<h3>Why a web application?</h3>
									</header>
									<p>
										Web applications are an wasy way to reach more users across the world, and is a good way to implement the XML functionalities required for the project.
									</p>
								</section>

							</div>
						</div>

					</section>

				</div>

	</body>
</html>