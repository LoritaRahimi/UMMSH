<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Moduli Administratorit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	
	<body class="is-preload">
	<?php
//including the database connection file
include_once("konfigurimi.php");

if(isset($_POST['shto'])) {	
	$Perdoruesi_1 = mysqli_real_escape_string($conn,$_POST['Perdoruesi']);
	$Fjalekalimi_1 = mysqli_real_escape_string($conn,MD5($_POST['Fjalekalimi']));
	$Email = mysqli_real_escape_string($conn,$_POST['Email']);
		
	// checking empty fields
	if(empty($Perdoruesi_1) || empty($Fjalekalimi_1) || empty($Email)) {			
		if(empty($Perdoruesi_1)) {echo "<font color='red'>Fusha Perdoruesi është e zbrazët.</font><br/>";}
		if(empty($Fjalekalimi_1)) {echo "<font color='red'>Fusha Fjalekalimi është e zbrazët..</font><br/>";}
		if(empty($Email)) {echo "<font color='red'>Fusha Email është e zbrazët.</font><br/>";}
		//link to the previous password
		
		}else {$Email = filter_var($Email, FILTER_SANITIZE_EMAIL);

		// Validate e-mail
				if (filter_var($Email, FILTER_VALIDATE_EMAIL) === false) {
					echo("$Email nuk eshte valide");
										
				}
		
		else{
			echo("$Email eshte valide");
	
		
		$rezultati = mysqli_query($lidhu_perdorues, "CALL shtoPerdorues('$Perdoruesi_1','$Fjalekalimi_1','$Email')"); 
		
	//	$result = mysqli_query($conn, "INSERT INTO ummsh_perdoruesit(Perdoruesi,Fjalekalimi,Email) VALUES('$Perdoruesi',MD5('$Fjalekalimi'),'$Email')");
		//display success messpassword
	echo "<script>
         setTimeout(function(){
            window.location.href = 'perdoruesit.php';
         }, 5000);
      </script>";
		 echo"<p><b>&nbsp &nbsp  E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";
	
		
	}
		}
}
?>
		
			

	</body>
</html>