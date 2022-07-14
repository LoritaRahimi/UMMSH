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
							
								

						<!-- Second Section -->
							

						<!-- Get Started -->
						<section id="content" class="main">
						<p style="text-align:right;">Përshëndetje, <em><?php  echo $perdoruesi;?>!</em></p>
						<section>
							<h2>Shto kategorine e mjetit shkollor</h2>
							<form method="post" action="shto_kategori.php">
								<div class="row gtr-uniform">
									<div class="col-6 col-12-xsmall">
										<input type="text" name="EmriKategorise" id="EmriKategorise" value="" placeholder="Emri i kategorise" />
									</div>
									<div class="col-12">
										<ul class="actions">
											<li><input type="submit" name="shto_kategori" value="Shto" class="primary" /></li>
										</ul>
									</div>
								</div>
							</form>
						 
						</section>
						
						<section>
						<form action="" method="post">
							<div class="table-wrapper">
							<table>
								<tr>
									<h3>Kërko të dhënat e kategorisë për modifikim ose fshirje</h3>
								</tr>
								<tr>
									<td>Shkruaj:</td>
									<td><input type="text" name="query" placeholder="Kategoria e Mjetit Shkollor" value="%"/></td>
									<td> <input type="submit" value="Kërko" class="button primary"/></td>
								</tr>
							</table> 
							</div>
							</form>	
						</section>
						
						<section>										
							<div class="table-wrapper">
								<table>
									<thead>
										<tr>
											<th>Kategoria</th>
											<th>Modifiko</th>
											<th>Fshij</th>
										</tr>
									</thead>
									<?php
									if (!empty($_REQUEST['query'])) {
									$query = mysqli_real_escape_string
									($lidhu_kategori,$_REQUEST['query']);     
									$sql = mysqli_query($lidhu_kategori,
									"CALL zgjedhQueryKategori('$query')"); 
									
									/* if (!empty($_REQUEST['term'])) {
									$term = mysqli_real_escape_string
									($conn,$_REQUEST['term']);     
									$sql = mysqli_query($conn,
									"SELECT * FROM ummsh_kategoritemjeteveshkollore 
									WHERE EmriKategorise LIKE '%".$term."%'"); */
									
									while($rreshti = mysqli_fetch_array($sql)) { 		
											echo "<tr>";
											echo "<td>".$rreshti['EmriKategorise']."</td>";
											echo "<td><a href=\"modifiko_kategori.php?ID_KategoriaMjetiShkollor=$rreshti[ID_KategoriaMjetiShkollor]\" class='button primary'>
									Modifiko</a></td>";
									echo "<td><a href=\"fshij_kategori.php?ID_KategoriaMjetiShkollor=$rreshti[ID_KategoriaMjetiShkollor]\" onClick=\"return confirm('A jeni te sigurt se deshironi te fshini kategorine e mjetit shkollor?')\"  class='button primary'>Fshij</a></td></tr>";		
										}

									}

									?>
									
									
								</table>
							</div>
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