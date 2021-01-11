<?php
// Connect to the Berts Surf Shop database
include "berts_connect.php";

$first = $_POST['fname'];
$last = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$redirect = false;

$sql = "INSERT INTO message(fname, lname, email, phone, message) 
VALUES ('$first', '$last', '$email', '$phone', '$message')";

if (mysqli_query($db_connection, $sql)) {
	echo "<br><br> New Record created succesfully";
	$redirect = true;
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($db_connection);
}
mysqli_close($db_connection);


// If the new record was successfully created than the page will automatically 
// 	redirect the user back to the home page.
if ($redirect = true){
	header("Location: index.php");
}

?>