<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("konfigurimi.php");	
?>
<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Moduli i Perdoruesit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<?php include_once("fillimi_faqes.php"); ?>

				<!-- Nav -->
					<?php include_once("meny_perdoruesit.php"); ?>
				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							

						<!-- First Section -->
							
								

						<!-- Second Section -->
							

						<!-- Get Started -->
						<section id="content" class="main">
						
							<section>
								<h2>Forma per kontakt</h2>
								<form method="post" action="shto_kontakt.php">
									<div class="row gtr-uniform">
										<div class="col-12">
											<input type="text" name="Subjekti" id="Subjekti" value="" placeholder="Subjekti" />								
										<br>
											<textarea name="Mesazhi" id="Mesazhi" placeholder="Mesazhi" rows="6"></textarea>
										
										<br>
											<input type="email" name="Email" id="Email" value="" placeholder="Email" />
										</div>
										<div class="col-12">
											<ul class="actions">
												<li><input type="submit" name="shto_kontakt" value="Dergo mesazh" class="primary" /></li>
											</ul>
										</div>
									</div>
								</form>							 
							</section>
										
						</section>
						
					</div>

				<!-- Footer -->
					<?php include_once("fundi_faqes.php"); ?>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>