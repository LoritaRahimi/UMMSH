<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");	
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
							<h2>Shto të dhënat e mjetit shkollor</h2>			
							<form enctype="multipart/form-data" method="post" action="shto_mjetShkollor.php" name="form1">
							<div class="table-wrapper">
								<table>								
									<tbody>
										<tr>									
											<select name="ID_KategoriaMjetiShkollor" id="ID_KategoriaMjetiShkollor">
											<option selected="selected">Zgjedh kategorine e mjetit shkollor</option>
												<?php
												
													$rez=mysqli_query($lidhu_kategori,"CALL zgjedhKategorite()");
												
													//	$res=mysqli_query($conn,"SELECT * FROM ummsh_kategoritemjeteveshkollore");
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
													<td><input type="text" name="Emri"/></td>
												</tr>
												<tr> 
													<td>Pershkrimi</td>
													<td><input type="text" name="Pershkrimi"/></td>
												</tr>
												<tr> 
													<td>Cmimi</td>
													<td><input type="text" name="Cmimi"/></td>
												</tr>
												<tr>
													<td><input type="hidden" name="MAX_FILE_SIZE" value="10000000" /></td>
													<td><input name="userfile" type="file" /></td>
												</tr>
											
												<tr>
													<td>		
														<input type="submit" name="shto_mjetShkollor" value="Shto" class="primary" />
													</td>
												</tr>
										
									
									
									</tbody>
								
								</table>
								</div>
								
								
							</form>
							
						</section>
						
						<section>
						<form action="" method="post">
							<div class="table-wrapper">
							<table>
								<tr>
								<h3>Kërko të dhënat e mjetit shkollor për modifikim ose fshirje</h3>
								</tr>
								<tr>
								<td>
								Shkruaj:
									</td>
									<td>
									<input type="text" name="query" placeholder="Emri i mjetit shkollor" value="%"/>
									</td>
									<td> <input type="submit" value="Kërko" class="button primary"/></td>
								</tr>
							</table> 
							</div>
							</form>	
						</section>
						<section>
										
										<div class="table-wrapper">
											<table>
												<thead>
													<tr>
														<th>Emri</th>
														<th>Pershkrimi</th>
														<th>Cmimi</th>
														<th>Foto</th>
														<th>Emri i fotos</th>
														<th>Kategoria</th>
														<th>Modifiko</th>
														<th>Fshij</th>
													</tr>
												</thead>
										<?php
										if (!empty($_REQUEST['query'])) {

										$query = mysqli_real_escape_string($lidhu_mjetShkollor,$_REQUEST['query']);     

										$sql = mysqli_query($lidhu_mjetShkollor, "CALL zgjedhQueryMjetetShkollore('$query') ");
										
										
										/*	if (!empty($_REQUEST['term'])) {

										$term = mysqli_real_escape_string($conn,$_REQUEST['term']);     

										$sql = mysqli_query($conn,	
									"SELECT
									  msh.ID_MjetiShkollor,
									  msh.Emri,
									  msh.Pershkrimi,
									  msh.Cmimi,
									  msh.Foto,
									  msh.EmriFotos,
									  kmsh.EmriKategorise
									  

									FROM
									  ummsh_mjetetshkollore msh
									INNER JOIN
									  ummsh_kategoritemjeteveshkollore kmsh ON msh.ID_KategoriaMjetiShkollor = kmsh.ID_KategoriaMjetiShkollor
									WHERE
									  msh.Emri LIKE '%".$term."%' OR msh.Cmimi LIKE '%".$term."%'"
										);  */

										while($rreshti = mysqli_fetch_array($sql)) { 		
												echo "<tr>";
												echo "<td>".$rreshti['Emri']."</td>";
												echo "<td>".$rreshti['Pershkrimi']."</td>";
												echo "<td>".$rreshti['Cmimi']."</td>";
												echo "<td><img src=data:image/jpeg;base64,".base64_encode($rreshti['Foto'])." width='80'  height='100'/></td>";
												echo "<td>".$rreshti['EmriFotos']."</td>";	
												echo "<td>".$rreshti['EmriKategorise']."</td>";
												
													
												
												
												echo "<td><a href=\"modifiko_mjetShkollor.php?ID_MjetiShkollor=$rreshti[ID_MjetiShkollor]\" class='button primary'>Modifiko</a> </td>";	
												echo "<td><a href=\"fshij_mjetShkollor.php?ID_MjetiShkollor=$rreshti[ID_MjetiShkollor]\" onClick=\"return confirm('A jeni te sigurt se deshironi te fshini te mjetin shkollor?')\"  class='button primary'>Fshij</a> </td>";			
														
											}

										}

										?>
												
												
											</table>
										</div>
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