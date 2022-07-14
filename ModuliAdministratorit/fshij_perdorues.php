<?php
//including the database connection file
include("konfigurimi.php");

//getting ID_Perdoruesi of the data from url
$ID_Perdoruesi = $_GET['ID_Perdoruesi'];

//deleting the row from table

$rezultati = mysqli_query($lidhu_perdorues,"CALL fshijPerdorues($ID_Perdoruesi)");

/*$result = mysqli_query($conn,"DELETE FROM ummsh_perdoruesit WHERE ID_Perdoruesi=$ID_Perdoruesi"); */

//redirecting to the display page (ID_Perdoruesi.php in our case)
header("Location:fshij_perdoruesTabela.php");
?>