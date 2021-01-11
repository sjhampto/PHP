<!DOCTYPE html>
<html>

<form action="User.php" method="get">
Please Enter Your Number Of Seconds: 
<input type="text" name="userSeconds">
<input type="submit" name="submit" />
</form>

<body>

<?php

function secondCounter($userSeconds){

	define("daysInYear", 365);
	define("hoursInDay", 24);
	define("minutesInHour", 60);
	define("secondsInMinutes", 60);
	//calculates the amount of seconds in a year using above constants
	define("secondsInYear", (daysInYear * hoursInDay * minutesInHour * secondsInMinutes));
	//calculates the amount of seconds in a day
	define("secondsInDay", (hoursInDay * minutesInHour * secondsInMinutes));
	//calculates the mount of seconds in an hour 
	define("secondsInHour", (minutesInHour * secondsInMinutes));

	$userSeconds = $_GET['userSeconds'];

	//divides userSeconds and secondsInYear and leaves int
	$secToYear = intdiv($userSeconds, secondsInYear);

	//gets the remaining seconds from secToYear
	$yearRemainSec = $userSeconds % secondsInYear;

	//divides yearRemainSec and secondsInDay and leaves int
	$days = intdiv($yearRemainSec, secondsInDay);

	//gets the remaining seconds from days
	$daysRemain = $yearRemainSec % secondsInDay;

	//divides daysRemain and secondsInHour and leaves int
	$hours = intdiv($daysRemain, secondsInHour);

	//gets the remaining seconds from hours
	$hoursRemain = $daysRemain % secondsInHour;

	//divides hoursRemain and secondsInMinutes and leaves int
	$minutes = intdiv($hoursRemain, secondsInMinutes);

	//gets the remaining seconds from minutes
	$seconds = $hoursRemain % secondsInMinutes;
	
	echo "There are $secToYear year(s), $days day(s), $hours hour(s), $minutes minute(s),
	$seconds second(s) in $userSeconds seconds";
}
	
if (!empty($_GET['userSeconds'])){
	$userSeconds = $_GET['userSeconds'];
	echo secondCounter($userSeconds);
}
	 
	
?>

</body>
</html>
