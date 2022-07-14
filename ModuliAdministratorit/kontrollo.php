<?php
/* Kontrollon sesionin */
include('konfigurimi.php');
session_start();
$kontrollo_perdorues=$_SESSION['Perdoruesi'];

$kontrollimi_sql = mysqli_query($lidhu,"CALL kontrolloPerdorues('$kontrollo_perdorues') ");
/*$ses_sql = mysqli_query($lidhu,"SELECT Perdoruesi FROM ummsh_perdoruesit WHERE Perdoruesi='$user_check' "); */
$rreshti=mysqli_fetch_array($kontrollimi_sql,MYSQLI_ASSOC);
$perdoruesi=$rreshti['Perdoruesi'];
if(!isset($kontrollo_perdorues))
{ header("Location: index.php");} 
?>