<?php
/* Kontrollon nese logini mund te kryhet me sukses, nese username dhe passwordi qe ka shkruar useri ne Index.php gjindet ne db ne MySQL */
	session_start();
	include("konfigurimi.php"); //Establishing connection with our database
	
	$error = ""; //Variable for storing our errors.
	if(isset($_POST["dergo"]))
	{
		if(empty($_POST["Perdoruesi"]) || empty($_POST["Fjalekalimi"]))
		{
			$error = "Kerkohet mbushja e te gjitha fushave!.";
		}else
		{
			// Definimi i $perdoruesi dhe $fjalekalimi
			$Perdoruesi=$_POST['Perdoruesi'];
			$Fjalekalimi=MD5($_POST['Fjalekalimi']);
			//Check username and password from database
			
			$sql="CALL zgjedhPerdorues('$Perdoruesi','$Fjalekalimi')";
			
/*		    $sql="SELECT ID_Perdoruesi FROM ummsh_perdoruesit WHERE Perdoruesi='$Perdoruesi' 
			and Fjalekalimi='$Fjalekalimi'"; */
			$rezultati=mysqli_query($lidhu_perdorues,$sql);
			$rreshti=mysqli_fetch_array($rezultati,MYSQLI_ASSOC);
			//If username and password exist in our database then create a session.
			//Otherwise echo error.
			if(mysqli_num_rows($rezultati) == 1)
			{
				$_SESSION['Perdoruesi'] = $Perdoruesi; // Initializing Session
				header("location: ballina_admin.php"); // Redirecting To Other Page
			}else
			{
				$error = "Perdoruesi ose Fjalekalimi gabim.";
			}
		}
	}
?>