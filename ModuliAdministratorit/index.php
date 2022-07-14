<?php
/* Index.php faqja qe permban formen e loginit) */
	include('kyqu.php'); // Include Login Script
	if ((isset($_SESSION['Perdoruesi']) != '')) 
	{
		header('Location: ballina_admin.php');
	}	
?>
<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Moduli i Administratorit</title>
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

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
									
										<section id="content" class="main">
										<section>
										<h3>Udhëzim</h3>
										<blockquote>Për t`u kycur në webaplikacion ju lutem kontaktone administratorin për krijimin e llogarisë</blockquote>
										</section>
										<section>
										<h2>Kycja ne webaplikacion</h2>
										<form method="post" action="">
											<div class="row gtr-uniform">
												<div class="col-6 col-12-xsmall">
													<input type="text" name="Perdoruesi" id="Perdoruesi" value="" placeholder="Përdoruesi" />
												</div>
												<div class="col-6 col-12-xsmall">
													<input type="password" name="Fjalekalimi" id="Fjalekalimi" value="" placeholder="Fjalëkalimi" />
												</div>
												
												
												<div class="col-12">
													<ul class="actions">
														<li><input type="submit" name="dergo" value="Kycu" class="primary" /></li>
														
													</ul>
												</div>
											</div>
										</form>
										</section>
										</section>
										
									</div>
									
								</div>
							</section>

						<!-- First Section -->
							
								

						<!-- Second Section -->
							

						<!-- Get Started -->
	

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