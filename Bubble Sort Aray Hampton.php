<!DOCTYPE html>
<html>

	<body>

		<?php
		//creates function to sort the given array
		function sortDaBubbles($bubbleArray){
			
			
			//creat a count of the array to use in the do while loop
			$arrayCount = count($bubbleArray);
			
			
			do{	
				$reordered = false;
				
				//goes through the array to reorder
				//numbers if they are in the wrong position
				for ($a = 0; $a < $arrayCount - 1; $a++){
					
					//swaps array data if found to be greater
					if ($bubbleArray[$a] > $bubbleArray[$a + 1]){
						
						list($bubbleArray[$a + 1], $bubbleArray[$a]) = 
						array($bubbleArray[$a],$bubbleArray[$a + 1]);
						$reordered = true;
					}					
				}
			} while ($reordered);
		
		return $bubbleArray;
		}
		
		//sets the bubbleArray data
		$bubbleArray = array(rand(1,100), rand(1,100), rand(1,100), rand(1,100), 
			rand(1,100), rand(1,100), rand(1,100), rand(1,100),
			rand(1,100), rand(1,100));;
		
		//uses a foreach loop to print each item in the array
		echo "Input array: ";
		foreach ($bubbleArray as $value){
			echo "$value ";
		}
		echo "<br />";
		echo "Sorted array: ";
		
		//uses foreach loop again but using the bubble sorting function
		//defined above
		foreach (sortDaBubbles($bubbleArray) as $value){
			echo "$value ";
			
		}
		
		?>

	</body>
	
</html>
