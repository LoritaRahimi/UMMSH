<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");	
?>
<?php
//including the database connection file
include_once("konfigurimi.php");

//fetching data in descending order (lastest entry first)
/*		$result = mysqli_query($conn,
		"SELECT * FROM ummsh_perdoruesit ORDER BY ID_Perdoruesi DESC"); */
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
							<form action="" method="post">
								<div class="table-wrapper">
								<table>
									<tr>
										<h3>Kërko të dhënat e përdoruesit për modifikim</h3>
									</tr>
									<tr>
										<td>Shkruaj:</td>
										<td><input type="text" name="query" placeholder="Përdoruesin ose Email-in" value="%"/></td>
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
												<th>Përdoruesi</th>
												<th>Fjalëkalimi</th>
												<th>Email-i</th>
												<th>Modifiko</th>
											</tr>
										</thead>
										<?php
										
										if (!empty($_REQUEST['query'])) {
										$query = mysqli_real_escape_string
										($lidhu_perdorues,$_REQUEST['query']);     
										$sql = mysqli_query($lidhu_perdorues,
										 "CALL zgjedhQueryPerdorues('$query')"); 
										
								/*		if (!empty($_REQUEST['term'])) {
										$term = mysqli_real_escape_string
										($conn,$_REQUEST['term']);     
										$sql = mysqli_query($conn,
										"SELECT * FROM ummsh_perdoruesit 
										WHERE Perdoruesi LIKE '%".$term."%'
										OR  Email LIKE '%".$term."%'");  */
										while($rreshti = mysqli_fetch_array($sql)) { 		
												echo "<tr>";
												echo "<td>".$rreshti['Perdoruesi']."</td>";
												echo "<td>".$rreshti['Fjalekalimi']."</td>";
												echo "<td>".$rreshti['Email']."</td>";
												echo "<td><a href=\"modifiko_perdoruesForma.php?ID_Perdoruesi=$rreshti[ID_Perdoruesi]\" class='button primary'>
										Modifiko</a></td>";
												
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