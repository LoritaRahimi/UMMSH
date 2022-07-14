<nav id="nav">	
	<?php
	
		$rezultati = mysqli_query($lidhu_meny, "CALL zgjedhEDhenaMenyPerdoruesit()");
		mysqli_next_result($lidhu_meny);
        //    $result = mysqli_query($conn, "SELECT * FROM ummsh_tedhenat WHERE PamjaFaqes='meny_perdoruesit'");
            while ($rreshti = mysqli_fetch_assoc($rezultati)) {

              extract($rreshti);
			  echo $PershkrimiTeDhenave;
			  
			 if($rezultati==null)
			mysqli_free_result($rezultati);
			}
            ?>
</nav>