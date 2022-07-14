<nav id="nav">	
	<?php
	
		$rezultati = mysqli_query($lidhu_meny, "CALL zgjedhEDhenaMenyAdmin()");
		mysqli_next_result($lidhu_meny);
           // $result = mysqli_query($lidhu_meny, "SELECT * FROM ummsh_tedhenat WHERE PamjaFaqes='meny_administratorit'");
            while ($rreshti = mysqli_fetch_assoc($rezultati)) {

              extract($rreshti);
			  echo $PershkrimiTeDhenave;
			  
			 if($rezultati==null)
			mysqli_free_result($rezultati);
			}
            ?>
</nav>