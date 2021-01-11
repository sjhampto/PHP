<!doctype html>
<html lang="en"> 
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
	
		<?php 
		
		
		function sumSeries($i){  
		
			$sum = 0;
		
			for ($n = 1; $n <= $i; $n++){ 
				    
				$sum += $n / ($n + 1); 
				echo "$n" . str_repeat("&nbsp;", 7) . number_format($sum, 4) . "<br \>";
			}  

		} 
		 
		$n = 20; 
		echo sumSeries($n); 
		  
		?>
    </body>

</html>

