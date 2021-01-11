<!doctype html>
<html lang="en"> 
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="resumeStyleSheet2.css">
    </head>
    <body>
	
        <center><h1 id="1" style="padding: 0px">
		<p id = "phpSample">
		PHP CODE SAMPLES</p>
		</h1></center>
		
		<center><p>
		Below you will find a download link to some examples <br>
            of my PHP work, as well as a live example.
		</p></center>
		
		<h2 style="padding-bottom: 20px">
		
		<center>
            
		<a href="PHP.zip" download class="button">PHP Code Samples</a>
        <a href="index.html" class="button">HOME</a>
		
		</center>	
	
		</h2>
        
		<center>
		<p>
		The PHP program below will take a user given number and then compute <br>
		a sum series to the length of that given number.<br>
		E.g. 1 / (1+1), 2 / (2+1), 3 / (3+1)...<br>
		You can also view this code in the PHP download file under the file name SumSeries.php
		</p>
		
		
        <form action="SumSeries.php" method="get">
			Please Enter A Number: 
			<input type="text" name="userNumber">
			<input type="submit" name="submit" />
		</form>
		
		<?php 
		
		
		function sumSeries($i){  
		
			$sum = 0;
		
			for ($n = 1; $n <= $i; $n++){ 
				    
				$sum += $n / ($n + 1); 
				echo "$n" . str_repeat("&nbsp;", 7) . number_format($sum, 4) . "<br \>";
			}  
			

		} 
		if (!empty($_GET['userNumber'])){
			$n = $_GET['userNumber'];
			echo sumSeries($n);
		}
		
		
		 
		  
		?>
        
		</center>
		
		<hr>
        
		<address style="color: white;">
        Website written by 
		<a href="mailto:sjhampto@gmail.com" style="color:white">
		Steven Hampton</a><br>
		This website is hosted on my personal <br>RaspberryPi web server
        
        </address>
        
    </body>

</html>