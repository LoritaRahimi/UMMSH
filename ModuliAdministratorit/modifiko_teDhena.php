<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");	
?>
<?php
// including the database connection file
include_once("konfigurimi.php");

if(isset($_POST['modifiko']))
{	
	$ID_edhena = $_POST['ID_edhena'];
	
	$TitulliTeDhenave=$_POST['TitulliTeDhenave'];
	$PershkrimiTeDhenave=$_POST['PershkrimiTeDhenave'];
	$Fajlli=$_POST['Fajlli'];	
	$PamjaFaqes=$_POST['PamjaFaqes'];
	
	// checking empty fields
	if(empty($TitulliTeDhenave) || empty($PershkrimiTeDhenave)  || empty($PamjaFaqes)) {	
			
		if(empty($TitulliTeDhenave)) {
			echo "<font color='red'>Fusha Titulli i te dhenave është e zbrazët.</font><br/>";
		}
		
		if(empty($PershkrimiTeDhenave)) {
			echo "<font color='red'>Fusha Pershkrimi i te dhenave është e zbrazët.</font><br/>";
		}
		
		if(empty($PamjaFaqes)) {
					echo "<font color='red'>Fusha Pamja e Faqes është e zbrazët.</font><br/>";
				}		
	} else {	
		
		mysqli_query($lidhu_teDhenat, "SET @p_ID_edhena='${ID_edhena}'");
		mysqli_query($lidhu_teDhenat, "SET @p_TitulliTeDhenave='${TitulliTeDhenave}'");
		mysqli_query($lidhu_teDhenat, "SET @p_PershkrimiTeDhenave='${PershkrimiTeDhenave}'");
		mysqli_query($lidhu_teDhenat, "SET @p_Fajlli='${Fajlli}'");
		mysqli_query($lidhu_teDhenat, "SET @p_PamjaFaqes='${PamjaFaqes}'");
		$rezultati=mysqli_query($lidhu_teDhenat,"CALL modifikoTeDhena(@p_ID_edhena,@p_TitulliTeDhenave,@p_PershkrimiTeDhenave,@p_Fajlli,@p_PamjaFaqes)");
		//updating the table
	//	$result = mysqli_query($conn,"UPDATE ummsh_tedhenat SET TitulliTeDhenave='$TitulliTeDhenave',PershkrimiTeDhenave='$PershkrimiTeDhenave',Fajlli='$Fajlli',PamjaFaqes='$PamjaFaqes' WHERE ID_edhena=$ID_edhena");
		
		if($rezultati)
		{
		
		header("Location: modifiko_teDhenaTabela.php");
		}
		else{
		die("Procedura UPDATE nuk u modifikua!");
		}
		
		
	}
}
?>
<?php
//getting uid from url
$ID_edhena = $_GET['ID_edhena'];

//selecting data associated with this particular uid

$rezultati = mysqli_query($lidhu_teDhenat,  "CALL zgjedhIdTeDhena('$ID_edhena')");

//$result = mysqli_query($conn,"SELECT * FROM ummsh_tedhenat WHERE ID_edhena=$ID_edhena");

while($rez = mysqli_fetch_array($rezultati))
{
	$TitulliTeDhenave1 = $rez['TitulliTeDhenave'];
	$PershkrimiTeDhenave1= $rez['PershkrimiTeDhenave'];
	$Fajlli1 = $rez['Fajlli'];
	$PamjaFaqes1 = $rez['PamjaFaqes'];
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
							<h2>Modifiko të dhënat</h2>
							<form method="post" action="modifiko_teDhena.php">
								<div class="row gtr-uniform">
									<div class="col-6 col-12-xsmall">
										Titulli i te dhenave
										<input type="text" name="TitulliTeDhenave" value='<?php echo $TitulliTeDhenave1;?>'  required /> <br>
										
										Pershkrimi
										<textarea name="PershkrimiTeDhenave" rows="10" cols="30"><?php echo $PershkrimiTeDhenave1;?></textarea> <br>
										
										Emri i file-it
										<input type="text" name="Fajlli" value='<?php echo $Fajlli1;?>'  />
										
										Pamja e faqes
										<input type="text" name="PamjaFaqes" value='<?php echo $PamjaFaqes1;?>' required />
									</div>
									<div class="col-12">
										<ul class="actions">
											<li><input type="hidden" name="ID_edhena" value='<?php echo $_GET['ID_edhena'];?>' /></li>
											<li><input type="submit" name="modifiko" value="Modifiko" class="primary" /></li>
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