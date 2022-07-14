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

		if(isset($_POST['shto_kategori'])) {	
			$EmriKategorise = $_POST['EmriKategorise'];
			
				
			// checking empty fields
			if(empty($EmriKategorise))  { 
						if(empty($EmriKategorise))	{echo "<font color='red'>Fusha Emri i Kategorisë është e zbrazët.</font><br/>";}
				
				//link to the previous programi
				echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
			} else { 
				// if all the fields are filled (not empty) 
				//insert data to database	
				
				$rezultati = mysqli_query($lidhu_kategori,"CALL shtoKategori('$EmriKategorise')");
				
		//		$result = mysqli_query($conn, "INSERT INTO ummsh_kategoritemjeteveshkollore(EmriKategorise) VALUES('$EmriKategorise')");
				
				echo "<script>
				 setTimeout(function(){
					window.location.href = 'menaxho_kategorite.php';
				 }, 5000);
			  </script>";
				 echo"<p><b>&nbsp &nbsp  E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";
			
			}
		}
		?>


		
	</body>
</html>