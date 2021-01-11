<?php
// Connect to the database.
$db_connection = mysqli_connect('localhost', 'root', '', 'berts_surf_shop')
OR
die(mysqli_connect_error());

// Check the connection
if (!$db_connection) {
	die("Connection failed: ".mysqli_connect_error());
	
} 


// Display MySQL version and host
// Use the commented if statement below to display the sql server connection.

//if (mysqli_ping($db_connection)){
//	echo 'MySQL Server '.mysqli_get_server_info($db_connection).' on '.
//	mysqli_get_host_info($db_connection).'<br><br>';	
//}

?>