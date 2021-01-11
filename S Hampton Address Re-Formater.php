<!doctype html>
<html lang="en"> 
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
	
        
        <form action="User.php" method="get">
            Please Enter An Address Using The Format Bellow:
            419%Main%Rd%Bladenboro%NC%28320
            <input type="text" name="userAddress">
            <input type="submit" name="submit" />
        </form>
        
		<?php
		
			//The purpose of this program is to take a given address and then 
			//convert and restructure the given address to a proper format
			
			$states = array( "AK", "AL", "AR", "AZ", "CA", "CO", "CT", "DC",  
				"DE", "FL", "GA", "HI", "IA", "ID", "IL", "IN", "KS", "KY", "LA",  
				"MA", "MD", "ME", "MI", "MN", "MO", "MS", "MT", "NC", "ND", "NE",  
				"NH", "NJ", "NM", "NV", "NY", "OH", "OK", "OR", "PA", "RI", "SC",  
				"SD", "TN", "TX", "UT", "VA", "VT", "WA", "WI", "WV", "WY");
			
			
			$userAddress = $_GET['userAddress'];


			$expString = explode("%", $userAddress);
			
			
			$expString = array_filter(array_map('trim', $expString));
			
			
			$impString = array_slice($expString,0, 3);
			
			
			$secString = array_slice($expString,3);
					
					
			$newUserAddress = implode("%",$impString).",%".implode("%", $secString);
	
	
			$newUserAddress = ucwords(trim(strtolower(
			str_replace("%", " ", $newUserAddress))));
			
			
			$stateFormat = strtoupper(substr($newUserAddress, -8));
			
			
			$newUserAddress = str_replace(substr($newUserAddress, -9),
			", $stateFormat", $newUserAddress);
			
			
			$stateAbr = substr($newUserAddress, -8, 2);


			if (in_array($stateAbr, $states)){
				
				echo "Input address = $userAddress<br />";
				echo "Output address = $newUserAddress";
			
			} else {
				echo "Invalid State";	
			}
			
		
		?>

    </body>

</html>

