<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php include_once("konfigurimi.php"); ?>
<html>
	<head>
		<title>Moduli i Përdoruesit</title>
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
							<section id="intro" class="main">
							 
							    <?php
								$vizita = 1;

								if (isset($_COOKIE["vizita"])) {
									$vizita = (int)$_COOKIE["vizita"];
								}
								$Muaji = 2592000 + time();
								//this adds 30 days to the current time
								setcookie("vizita", date("F jS - g:i a"), $Muaji);
								if (isset($_COOKIE['vizita'])) {
									$e_fundit = $_COOKIE['vizita'];
									echo "<p style='text-align:right;'>Vizita juaj e fundit ishte me: " . $e_fundit . "</p>";
								} else {
									echo "<p style='text-align:right;'>Vizita juaj e pare ne webaplikacion tone! Ju deshirojme mireseardhje!</p>";
								}
								?>
								
								<?php
								
								$rezultati = mysqli_query($lidhu_mjetShkollor,  "CALL zgjedhMjetetShkollore()");
								
								/*		$result = mysqli_query($conn, 
										"SELECT 
										kmsh.EmriKategorise,
										msh.Emri,
										msh.Pershkrimi,
										msh.Cmimi,
										msh.Foto, 
										msh.EmriFotos
										FROM ummsh_mjetetshkollore msh
							LEFT OUTER JOIN ummsh_kategoritemjeteveshkollore kmsh ON msh.ID_KategoriaMjetiShkollor = kmsh.ID_KategoriaMjetiShkollor
							GROUP BY kmsh.EmriKategorise, msh.Emri, msh.Pershkrimi, msh.Cmimi, msh.Foto, msh.EmriFotos
							ORDER BY kmsh.ID_KategoriaMjetiShkollor, msh.ID_MjetiShkollor DESC"); */
										while ($rreshti = mysqli_fetch_assoc($rezultati)) {

										  extract($rreshti);
										  
										  
							if($rezultati==null)
							  mysqli_free_result($rezultati);

										?> 
															<section>
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2><?php echo $Emri; ?></h2>
										</header>
										<blockquote>
											<b><?php echo $EmriKategorise; ?></b>
										</blockquote>
										<p><?php echo $Pershkrimi; ?></p>
										<p><b><?php echo $Cmimi; ?> €</b></p>
										
									</div>
									<span class="image">
										<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $rreshti['Foto'] ).'" width="100%" height="100%">'; ?>
									</span>
								</div>
							</section>
							
							<?php } ?>
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