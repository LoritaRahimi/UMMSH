<?php
//including the database connection file
include("konfigurimi.php");

//getting ID_MjetiShkollor of the data from url
$ID_MjetiShkollor = $_GET['ID_MjetiShkollor'];

//deleting the row from table

$rezultati = mysqli_query($lidhu_mjetShkollor,"CALL fshijMjetShkollor('$ID_MjetiShkollor')");

/* $result = mysqli_query($conn,"DELETE FROM ummsh_mjetetshkollore WHERE ID_MjetiShkollor=$ID_MjetiShkollor");*/

//redirecting to the display page (menaxho_mjetetShkollore.php in our case)
header("Location:menaxho_mjetetShkollore.php");
?>

