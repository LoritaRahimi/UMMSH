<footer id="footer">

		<?php							
			$rezultati = mysqli_query($lidhu_fundiFaqes, "CALL zgjedhFundiFaqesPershkrimi()");
			mysqli_next_result($lidhu_fundiFaqes);			
			//$result = mysqli_query($conn, "SELECT * FROM ummsh_tedhenat WHERE PamjaFaqes='FundiFaqes_Transporti'");
			while ($rreshti = mysqli_fetch_assoc($rezultati)) {

			extract($rreshti);
		  
		  
			if($rezultati==null)
			mysqli_free_result($rezultati);
         ?>
				<section>
					<h3><?php echo $TitulliTeDhenave ?></h3>
					<p><?php echo $PershkrimiTeDhenave; ?></p>
				</section>
		<?php } ?>
			
		<?php
			$rezultati = mysqli_query($lidhu_fundiFaqes,  "CALL zgjedhFundiFaqesTeDhena()");										
			mysqli_next_result($lidhu_fundiFaqes);
			//  $result = mysqli_query($conn, "SELECT * FROM ummsh_tedhenat WHERE PamjaFaqes='FundiFaqes_TeDhena'");
            while ($rreshti = mysqli_fetch_assoc($rezultati)) {

             extract($rreshti);  
			  
			if($rezultati==null)
			mysqli_free_result($rezultati);
          ?>
				<section>
					<h4><?php echo $TitulliTeDhenave ?></h4>
					<?php echo $PershkrimiTeDhenave; ?>
				
		<?php } ?>
			
			
		<?php
		$rezultati = mysqli_query($lidhu_fundiFaqes, "CALL zgjedhFundiFaqesRrjetetSociale()");
		mysqli_next_result($lidhu_fundiFaqes);
		//   $result = mysqli_query($conn, "SELECT * FROM ummsh_tedhenat WHERE PamjaFaqes='FundiFaqes_RrjetetSociale'");
        while ($rreshti = mysqli_fetch_assoc($rezultati)) {

        extract($rreshti);
			  
			  
		if($rezultati==null)
		 mysqli_free_result($rezultati);

            ?>
					
					
				<?php echo $PershkrimiTeDhenave; ?>
						</section>
				<?php } ?>
			
			
			<?php
            $rezultati = mysqli_query($lidhu_fundiFaqes, "CALL zgjedhFundiFaqesCopyRight()");
			//	$result = mysqli_query($conn, "SELECT * FROM ummsh_tedhenat WHERE PamjaFaqes='FundiFaqes_CopyRight'");
			mysqli_next_result($lidhu_fundiFaqes);
            while ($rreshti = mysqli_fetch_assoc($rezultati)) {

             extract($rreshti);
			  
			  
			if($rezultati==null)
			mysqli_free_result($rezultati);

            ?>
					
					
				<?php echo $PershkrimiTeDhenave; ?>
					
			<?php } ?>
</footer>

























