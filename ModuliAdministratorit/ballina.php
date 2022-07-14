<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");	
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
					<?php include_once("meny_admin.php"); ?>
					
				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							

						<!-- First Section -->
						<section id="first" class="main special">
						
						<p style="text-align:right;">Përshëndetje, <em><?php  echo $perdoruesi;?>!</em></p>	
								<header class="major">
									<h2>MENAXHIMI I TË DHËNAVE TË BALLINËS</h2>
								</header>
								<ul class="features">
									<li>
										<span class="icon major style5 fa-gem"></span>
										<a href="menaxho_kategorite.php"><h3>Menaxho Kategoritë e Mjeteve Shkollore</h3></a>
										<p>Forma për menaxhimin e kategorive në webaplikacion.</p>
									</li>
									<li>
										<span class="icon major style5 fa-gem"></span>
										<a href="menaxho_mjetetShkollore.php"><h3>Menaxho Mjetet Shkollore</h3></a>
										<p>Forma për menaxhimin e mjeteve shkollore në webaplikacion.</p>
									</li>
									<li>
										<span class="icon major style5 fa-gem"></span>
										<a href="modifiko_tedhenaTabela.php"><h3>Modifiko të dhënat</h3></a>
										<p>Forma për modifikimin e të dhënave të webaplikacionit.</p>
									</li>
								</ul>
								
						</section>
							
								

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