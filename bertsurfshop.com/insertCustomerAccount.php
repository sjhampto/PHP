<?php

// Connect to the petshop Database
include "berts_connect.php";

$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['password'];

// Inititialize the $redirect boolean. 
$redirect = false;

// Hash the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// sql insert command
$sql = "
INSERT INTO customer_accounts(firstName, lastName, email, phone, username, hashed_password)
VALUES ('$firstName', '$lastName', '$email', '$phone', '$username', '$hashed_password')";



// Run query and display results
if (mysqli_query($db_connection, $sql)){
	echo "<br><br> New Record Successfully Created";
	$redirect = true;
} 
else {
	echo "Error: " . $sql . "<br>" . mysqli_error($db_connection);
	
}

// Close the database
mysqli_close($db_connection);

// If the new record was successfully created than the page will automatically 
// 	redirect the user back to the home page.
if ($redirect = true){
	header("Location: login.php");
}

?>