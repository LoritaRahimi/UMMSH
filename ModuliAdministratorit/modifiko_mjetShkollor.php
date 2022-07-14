<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");	
?>
<?php
// including the database connection file
include_once("konfigurimi.php");

if(isset($_POST['modifiko_mjetShkollor']))
{	
	$ID_MjetiShkollor = $_POST['ID_MjetiShkollor'];
	$Emri=$_POST['Emri'];
	$Pershkrimi=$_POST['Pershkrimi'];
	$Cmimi=$_POST['Cmimi'];	
	$ID_KategoriaMjetiShkollor=$_POST['ID_KategoriaMjetiShkollor'];	
	
	$Foto =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
	$EmriFotos = $_FILES['userfile']['name'];
	$maxsize = 10000000; //set to approx 10 MB
	
	// checking empty fields
	if(empty($Emri) || empty($Pershkrimi) || empty($Cmimi)) {	
			
		if(empty($Emri)) {
			echo "<font color='red'>Fusha Emri është e zbrazët. </font><br/>";
		}
		
		if(empty($Pershkrimi)) {
			echo "<font color='red'>Fusha Pershkrimi është e zbrazët.</font><br/>";
		}
		
		if(empty($Cmimi)) {
			echo "<font color='red'>Fusha Cmimi është e zbrazët.</font><br/>";
		}
				
	} else {	
	
		//updating the table
		
		mysqli_query($conn1, "SET @p_ID_MjetiShkollor='${ID_MjetiShkollor}'");
		mysqli_query($conn1, "SET @p_Emri='${Emri}'");
		mysqli_query($conn1, "SET @p_Pershkrimi='${Pershkrimi}'");
		mysqli_query($conn1, "SET @p_Cmimi='${Cmimi}'");
		mysqli_query($conn1, "SET @p_Foto='${Foto}'");
		mysqli_query($conn1, "SET @p_EmriFotos='${EmriFotos}'");
		mysqli_query($conn1, "SET @p_ID_KategoriaMjetiShkollor='${ID_KategoriaMjetiShkollor}'");
		
		$rezultati = mysqli_query($conn1,"CALL modifikoMjetShkollor(@p_ID_MjetiShkollor,@p_Emri,@p_Pershkrimi,@p_Cmimi,@p_Foto,@p_EmriFotos,@p_ID_KategoriaMjetiShkollor)");
		
		
	//	$result = mysqli_query($conn,"UPDATE ummsh_mjetetshkollore SET Emri='$Emri',Pershkrimi='$Pershkrimi',Cmimi='$Cmimi', Foto='$Foto', EmriFotos='$EmriFotos',ID_KategoriaMjetiShkollor='$ID_KategoriaMjetiShkollor' WHERE ID_MjetiShkollor=$ID_MjetiShkollor");
		
		//redirectig to the display message. In our case, it is ballina.php
		if($rezultati)
		{
		header("Location:menaxho_mjetetShkollore.php");
		}
		else{
		die("Procedura UPDATE nuk u modifikua!");
		}
		
		}
		}
?>
<?php
//getting ID_MjetiShkollor from url
$ID_MjetiShkollor = $_GET['ID_MjetiShkollor'];

//selecting data associated with this particular ID_MjetiShkollor

$rezultati = mysqli_query($lidhu_mjetShkollor,  "CALL zgjedhIdMjetShkollor('$ID_MjetiShkollor')");

//$result = mysqli_query($conn,"SELECT * FROM ummsh_mjetetshkollore WHERE ID_MjetiShkollor=$ID_MjetiShkollor");

while($rez = mysqli_fetch_array($rezultati))
{
	$Emri = $rez['Emri'];
	$Pershkrimi = $rez['Pershkrimi'];
	$Cmimi = $rez['Cmimi'];
	$ID_KategoriaMjetiShkollor = $rez['ID_KategoriaMjetiShkollor'];
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
							<h2>Shto të dhënat e mjetit shkollor për modifikim</h2>							
							<form enctype="multipart/form-data" method="post" action="modifiko_mjetShkollor.php" name="form1">							
							<div class="table-wrapper">
								<table>
									<tbody>
										<tr>										
											<select name="ID_KategoriaMjetiShkollor" id="ID_KategoriaMjetiShkollor">
											<option selected="selected">Zgjedh kategorine e mjetit shkollor</option>
												<?php
												//	$res=mysqli_query($conn,"SELECT * FROM ummsh_kategoritemjeteveshkollore");
													
													$rez=mysqli_query($conn1, "CALL zgjedhKategorite");
													
													while($rreshti=$rez->fetch_array())
													{
														?>
														<option value="<?php echo $rreshti['ID_KategoriaMjetiShkollor']; ?>"><?php echo $rreshti['EmriKategorise']; ?></option>
														<?php
													}
													?>
											</select><br/>
										</tr>
												<tr> 
													<td>Emri</td>
													<td><input type="text" name="Emri" value='<?php echo $Emri;?>' required /></td>
												</tr>
												<tr> 
													<td>Pershkrimi</td>
													<td><input type="text" name="Pershkrimi" value='<?php echo $Pershkrimi;?>' required /></td>
												</tr>
												<tr> 
													<td>Cmimi</td>
													<td><input type="text" name="Cmimi" value='<?php echo $Cmimi;?>' required /></td>
												</tr>
												<tr>
													
													<td><input type="hidden" name="MAX_FILE_SIZE" value="10000000" /></td>
													<td><input name="userfile" type="file" /></td>
												</tr>
											
												<tr>
													<td><input type="hidden" name="ID_MjetiShkollor" value='<?php echo $_GET['ID_MjetiShkollor'];?>' /></td>
													<td><input type="submit" name="modifiko_mjetShkollor" value="Modifiko" class="primary" /></td>													
												</tr>																												
									</tbody>								
								</table>
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