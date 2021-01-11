<!doctype html>
<html lang="en"> 
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
	
		<?php
		
			//Comment in or out cc# you would like to test
			
			//User Supplied CC#
			//$creditCardNumber = "";
			
			//Visa Example
			$creditCardNumber = "4111111111111111";
			
			//Mastercard Example
			//$creditCardNumber = "5212121212121211";
			
			//American Express Example
			//$creditCardNumber = "311111110101010";
			
			//Discover Example
			//$creditCardNumber = "6111111212121212";
			
			//Invalid Example
			//$creditCardNumber = "4388576018402626";

			//Main function to validate cc# using all other functions.
			function isCCValid($creditCardNumber){
				
				checkType($creditCardNumber);
				checkLength($creditCardNumber);
				convertCC2Array($creditCardNumber);
				doubleSumEvenPos($creditCardNumber);
				sumOddPos($creditCardNumber);
				sumMod($creditCardNumber);
				
				$isValid = true;
				
				//if length function and mod function validate isCCValid validates
				if (!checkLength($creditCardNumber) || !sumMod($creditCardNumber)){
					$isValid = false;
				} return $isValid;
				
			
			}
			
			//function chekcing the type of credit card agains the first digit of CC#
			function checkType($creditCardNumber){
				//check the first digit of the CC# for validity and returns the CC type
				$creditCardType = "";
				
				
				if ($creditCardNumber[0] == 3){
					$creditCardType = "AMEX";
				} elseif ($creditCardNumber[0] == 4){
					$creditCardType = "VISA";
				} elseif ($creditCardNumber[0] == 5){
					$creditCardType = "MCRD";
				} elseif ($creditCardNumber[0] == 6){
					$creditCardType = "DISC";
				} else {
					$creditCardType = "INVD";
				}
				return $creditCardType;
				
			}


			
			function checkLength($creditCardNumber){
				//check CC length against CC type
				checkType($creditCardNumber);
				$length = strlen($creditCardNumber);
				$isValid = false;
				
				//validates wether cc# is the proper length for its card type
				if ($length == 15 && $creditCardType = "AMEX"){
					$isValid = true;
					
				} elseif ($length == 16 && $creditCardType = "DISC"){
					$isValid = true;
					
				} elseif ($length == 16 && $creditCardType = "MCRD"){
					$isValid = true;
					
				} elseif ($length == 16 && $creditCardType = "VISA"){
					$isValid = true;
					
				} else {
					$isValid = false;
					
				}
				return $isValid;
				
				
				
			}
			
			
			//converts each CC# to an array item and returns that array
			function convertCC2Array($creditCardNumber){
				//convert CC# to an array
				$ccArray = str_split($creditCardNumber);
				return $ccArray;
				
			}
			
			
			
			function doubleSumEvenPos($creditCardNumber){
				//performs the calculations from step 1 and 2
				//cycle backwards through the cc num array
				
				$ccArray = convertCC2Array($creditCardNumber);
				
				$ccNumSum = 0;
				
				//For loop to cycle back through the cc# starting at the second 
				//to last number.
				for ($n = count($ccArray) -2; $n >= 0; $n = $n -2){
					
					//Creats a sum of the doubled array cc number
					$numSum = $ccArray[$n] * 2;
					
					//If the result from the for loop is larger than 10 if statement will
					//add both numbers in the result together for a single digit integer.
					if ($numSum >= 10){
						$numSum = (int)($numSum / 10) + ($numSum % 10);
					}
					
					$ccNumSum = $ccNumSum + $numSum;
					
				} 
				
				return $ccNumSum;
				
			}
			
			//Cycles backwards through CC# array adding every other number together.
			function sumOddPos($creditCardNumber){
				//perform calculations from step 3
				$ccArray = convertCC2Array($creditCardNumber);
				
				$ccSumOdd = 0;
				
				for ($n = count($ccArray) -1; $n >= 0; $n = $n - 2){
					
					$numSum = $ccArray[$n];
					
					$ccSumOdd = $ccSumOdd + $numSum;
					
				} 
				
				return $ccSumOdd;
				
			}
			
			
			
			function sumMod($creditCardNumber){
				//perform calculations from 4 and 5
				//add ccSumOdd and ccNumSum 
				$ccSumOdd = sumOddPos($creditCardNumber);
				$ccNumSum = doubleSumEvenPos($creditCardNumber);
				$validMod = false;
				
				
				$sumMod = $ccSumOdd + $ccNumSum;
				
				//If remainder from ccSumOdd and ccNumSum is not 0 sumMod will 
				//return false
				if ($sumMod % 10 != 0){
					$validMod = false;
				} else {
					$validMod = true;	
				}
				
				return $validMod;
			}
			
			if (isCCValid($creditCardNumber))
				echo $creditCardNumber . " is valid.";
			else
				echo $creditCardNumber . " is not valid.";
			
			
		?>

    </body>

</html>
