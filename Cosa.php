

<!-- load form xml file -->

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

							if ($cont > $min && $cont < $max) {
								$value;
								$currency;

								foreach ($child->children() as $child) {

									if ($child -> getName() == "title") {

										$currency = $child;

									}

									if ($child -> getName() == "description") {

										$value = $child;

									}

								}

								$value = substr($value, 9, 8);

								$currency = substr($currency, 0, 3);

								echo(" <form method='post' action='upvote.php'>

							<input type='hidden' name='value' value='$currency/EUR' >
							<input type='hidden' name='vae' value='$value' >
							<input type='submit' class='buttonCustom' value=' $value  $currency/EUR ' name='like'>
	
								 ");
				

							}

							$cont++;
						}

						echo '	</ul>
						</div>
						</section>
						</div>';

					}
					?>