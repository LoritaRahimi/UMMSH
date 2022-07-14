<?php
//including the database connection file
include("konfigurimi.php");

//getting ID_KategoriaMjetiShkollor of the data from url
$ID_KategoriaMjetiShkollor = $_GET['ID_KategoriaMjetiShkollor'];

$rezultati = mysqli_query($lidhu_kategori,"CALL fshijKategori($ID_KategoriaMjetiShkollor)");
//deleting the row from table
/*$result = mysqli_query($conn,"DELETE FROM ummsh_kategoritemjeteveshkollore WHERE ID_KategoriaMjetiShkollor=$ID_KategoriaMjetiShkollor"); */

//redirecting to the display page (menaxho_kategorite.php in our case)
header("Location:menaxho_kategorite.php");
?>

