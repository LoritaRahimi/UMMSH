		
		<?php
		
			$rezultati = mysqli_query($lidhu_fillimiFaqes, "CALL zgjedhEDhenaFillimiFaqes()");
        //    $result = mysqli_query($conn, "SELECT * FROM ummsh_tedhenat WHERE PamjaFaqes='fillimi_faqes'"); 
			mysqli_next_result($lidhu_fillimiFaqes);
            while ($rreshti = mysqli_fetch_assoc($rezultati)) {

              extract($rreshti);
			  
			 if($rezultati==null)
			mysqli_free_result($rezultati);

            ?>
					<header id="header" class="alt">
						<span class="logo"><img src="<?php echo $Fajlli ?>" alt="" /></span>
						<h1><?php echo $TitulliTeDhenave ?></h1>
					</header>
			<?php } ?>