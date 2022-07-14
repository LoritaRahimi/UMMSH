<?php
//including the database connection file
include("konfigurimi.php");

//getting ID_Kontakti of the data from url
$ID_Kontakti = $_GET['ID_Kontakti'];

//deleting the row from table
$rezultati = mysqli_query($lidhu_kontakt,"CALL fshijKontakt('$ID_Kontakti')");
/* $result = mysqli_query($conn,"DELETE FROM ummsh_kontakti WHERE ID_Kontakti=$ID_Kontakti"); */

//redirecting to the display page (fshij_kontaktForma in our case)
header("Location:fshij_kontaktForma.php");
?>