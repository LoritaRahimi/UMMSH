<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");	
?>
<?php
// including the database connection file
include_once("konfigurimi.php");

if(isset($_POST['modifiko']))
{	
	$ID_Perdoruesi = $_POST['ID_Perdoruesi'];
	
	$Perdoruesi=$_POST['Perdoruesi'];
	$Fjalekalimi=MD5($_POST['Fjalekalimi']);
	$Email=$_POST['Email'];	
	
	
	// checking empty fields
	if(empty($Perdoruesi) || empty($Fjalekalimi) || empty($Email)) {	
			
		if(empty($Perdoruesi)) {
			echo "<font color='red'>Fusha Perdoruesi është e zbrazët.</font><br/>";
		}
		
		if(empty($Fjalekalimi)) {
			echo "<font color='red'>Fusha Fjalekalimi është e zbrazët.</font><br/>";
		}
		
		if(empty($Email)) {
			echo "<font color='red'>Fusha Email është e zbrazët.</font><br/>";
		}
				
	} else {	
		
		mysqli_query($conn2, "SET @p_ID_Perdoruesi=${ID_Perdoruesi}");
		mysqli_query($conn2, "SET @p_Perdoruesi='${Perdoruesi}'");
		mysqli_query($conn2, "SET @p_Fjalekalimi='${Fjalekalimi}'");
		mysqli_query($conn2, "SET @p_Email='${Email}'");
		//updating the table
		
		$rezultati = mysqli_query($conn2, "CALL modifikoPerdorues(@p_ID_Perdoruesi,@p_Perdoruesi,@p_Fjalekalimi,@p_Email)");
//		$result = mysqli_query($conn,"UPDATE ummsh_perdoruesit SET Perdoruesi='$Perdoruesi',Fjalekalimi=MD5('$Fjalekalimi'),Email='$Email' WHERE ID_Perdoruesi=$ID_Perdoruesi");
		
		
		if($rezultati)
		{
		
		header("Location:modifiko_perdorues.php");
		}
		else{
		die("Procedura UPDATE nuk u modifikua!");
		}
	}
}
?>
<?php
//getting ID_Perdoruesi from url
$ID_Perdoruesi = $_GET['ID_Perdoruesi'];


$rezultati = mysqli_query($conn3, "CALL zgjedhIdPerdorues('$ID_Perdoruesi')");
//selecting data associated with this particular ID_Perdoruesi
//$result = mysqli_query($conn,"SELECT * FROM ummsh_perdoruesit WHERE ID_Perdoruesi=$ID_Perdoruesi");

while($rez = mysqli_fetch_array($rezultati))
{
	$Perdoruesi_1 = $rez['Perdoruesi'];
	$Fjalekalimi_1= $rez['Fjalekalimi'];
	$Email_1 = $rez['Email'];
	
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
							<h2>Modifiko të dhënat e përdoruesit</h2>
							<form method="post" action="modifiko_perdoruesForma.php">
								<div class="row gtr-uniform">
									<div class="col-6 col-12-xsmall">
										Përdoruesi
										<input type="text" name="Perdoruesi" value='<?php echo $Perdoruesi_1;?>' /> <br>
										
										Fjalëkalimi
										<input type="text" name="Fjalekalimi" value='<?php echo $Fjalekalimi_1;?>' /> <br>
										
										Email-i
										<input type="text" name="Email" value='<?php echo $Email_1;?>' />
										
										
									</div>
									<div class="col-12">
										<ul class="actions">
											<li><input type="hidden" name="ID_Perdoruesi" value='<?php echo $_GET['ID_Perdoruesi'];?>' /></li>
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