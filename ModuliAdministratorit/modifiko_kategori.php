<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");	
?>
<?php
// including the database connection file
include_once("konfigurimi.php");

if(isset($_POST['modifiko_kategori']))
{	
	$ID_KategoriaMjetiShkollor = $_POST['ID_KategoriaMjetiShkollor'];
	
	$EmriKategorise=$_POST['EmriKategorise'];
	
	
	// checking empty fields
	if(empty($EmriKategorise) ) {	
			
		if(empty($EmriKategorise)) {
			echo "<font color='red'>Fusha e Emri i Kategorisë është e zbrazët.</font><br/>";
		}
		
	
	} else {	
		//updating the table
		
		 mysqli_query($conn1, "SET @p_ID_KategoriaMjetiShkollor='${ID_KategoriaMjetiShkollor}'");
		 mysqli_query($conn1, "SET @p_EmriKategorise='${EmriKategorise}'");
		$rezultati = mysqli_query($conn1, "CALL modifikoKategori(@p_ID_KategoriaMjetiShkollor,@p_EmriKategorise)");
//		$result = mysqli_query($conn,"UPDATE ummsh_kategoritemjeteveshkollore SET EmriKategorise='$EmriKategorise' WHERE ID_KategoriaMjetiShkollor=$ID_KategoriaMjetiShkollor");
		
		if($rezultati)
		{
		header("Location: menaxho_kategorite.php");
		}
		else{
		die("Procedura UPDATE nuk u modifikua!");
		}
		
		
	}
}
?>
<?php
//getting ID_KategoriaMjetiShkollor from url
$ID_KategoriaMjetiShkollor = $_GET['ID_KategoriaMjetiShkollor'];


$rezultati = mysqli_query($lidhu_kategori, "CALL zgjedhIdKategori('$ID_KategoriaMjetiShkollor')");
//$result = mysqli_query($conn,"SELECT * FROM ummsh_kategoritemjeteveshkollore WHERE ID_KategoriaMjetiShkollor=$ID_KategoriaMjetiShkollor");

while($rez = mysqli_fetch_array($rezultati))
{
	$EmriKategorise = $rez['EmriKategorise'];
	
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
							<h2>Modifiko të dhënat e kategorisë së mjetit shkollor</h2>
							<form method="post" action="modifiko_kategori.php">
								<div class="row gtr-uniform">
									<div class="col-6 col-12-xsmall">
										Emri i kategorisë
										<input type="text" name="EmriKategorise" id="EmriKategorise" value='<?php echo $EmriKategorise;?>' required />
									</div>
									<div class="col-12">
										<ul class="actions">
											<li><input type="hidden" name="ID_KategoriaMjetiShkollor" value='<?php echo $_GET['ID_KategoriaMjetiShkollor'];?>' /></li>
											<li><input type="submit" name="modifiko_kategori" value="Modifiko" class="primary" /></li>
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