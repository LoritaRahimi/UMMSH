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
		<?php
//including the database connection file
include_once("konfigurimi.php");

if(isset($_POST['shto_mjetShkollor'])) {	
	$Emri = $_POST['Emri'];
	$Pershkrimi = $_POST['Pershkrimi'];
	$Cmimi = $_POST['Cmimi'];
	
	$Foto =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
	$EmriFotos = $_FILES['userfile']['name'];
	
	 $maxsize = 10000000; //set to approx 10 MB
	 
	 $ID_KategoriaMjetiShkollor = $_POST['ID_KategoriaMjetiShkollor'];
	
		

 //set error handler
	

 //trigger error
 
	$test=50;
	
	
	// checking empty fields
	if(empty($Emri) || empty($Pershkrimi)|| empty($Cmimi)  || empty($ID_KategoriaMjetiShkollor)) {
				
		if(empty($Emri)) {
			echo "<font color='red'>Fusha Emri është e zbrazët.</font><br/>";
		}
		
		if(empty($Pershkrimi)) {
			echo "<font color='red'>Fusha Pershkrimi është e zbrazët.</font><br/>";
		}
		
		if(empty($Cmimi)) {
			echo "<font color='red'>Fusha Cmimi është e zbrazët.</font><br/>";
		}
		if(empty($ID_KategoriaMjetiShkollor)) {
			echo "<font color='red'>Fusha ID Kategoria e Mjetit Shkollor është e zbrazët.</font><br/>";
		}
		
	}else { 
								
				if ($Cmimi>=50 ){
					trigger_error("<p style='color:red'>&nbsp &nbsp Cmimi i mjetit shkollor duhet të jetë më i vogël se 50. <br> &nbsp &nbsp Kthehuni mbrapa për ta përmirsuar të dhënën në fushën e Cmimit.</p>");
							
	} else { 
		
			
		$rezultati = mysqli_query($lidhu_mjetShkollor, "CALL shtoMjetShkollor('$Emri','$Pershkrimi','$Cmimi','$Foto','$EmriFotos','$ID_KategoriaMjetiShkollor')");
		
		//$result = mysqli_query($conn, "INSERT INTO ummsh_mjetetshkollore(Emri,Pershkrimi,Cmimi,Foto, EmriFotos, ID_KategoriaMjetiShkollor) VALUES('$Emri','$Pershkrimi','$Cmimi','$Foto', '$EmriFotos', '$ID_KategoriaMjetiShkollor')");
		
		//display success message
			echo "<script>
         setTimeout(function(){
            window.location.href = 'menaxho_mjetetShkollore.php';
         }, 5000);
      </script>";
		 echo"<p><b>&nbsp &nbsp  E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";
		 
		
		}
	}
}
?>
		
	</body>
</html>