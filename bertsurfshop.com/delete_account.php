<!doctype html>
<html lang="en"> 
    <head>
		<title>Delete Account</title>
        <meta charset="utf-8" name="viewport" 
			content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="indexStyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
		
		<center>
        <?php include ("navigation.php"); ?>
		</center>
		
		<!-- Create main site header with company logo. -->
		<div class = "logoPanel">
			<center><h1 id="1" >
				<p id = "headMain">
				
					<img src="images/bertLogo.png" alt="bertsss" 
							vspace="12" id = "shadowGames">
							
				</p>
			</h1></center>
		</div>
		
		<center>
		<p> PLEASE ENTER YOUR USERNAME AND PASSWORD <BR>
		TO DELETE YOUR ACCOUNT.</p>
		</center>
	
		<center>
		
		<div class="logInHolder">
            <br>
			
			<?php
			// Create a counter for unsuccessful logins
			$FailedLogins = 0;
			
			
			// Check to see if this form has been submitted
			// If form has been submitted
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				
				// Check for less than 3 failed logins
				if($FailedLogins < 3){
					$username = $_POST['username'];
					$password = $_POST['password'];
					
					// Connect to the petshop database
					include "berts_connect.php";
					
					// Collect password from database if there is a username that matches
					// the user name entered
					$sql = "SELECT hashed_password FROM customer_accounts WHERE username='$username'";
					
					// Run query and display results
					$r = mysqli_query($db_connection, $sql);
					
					if ($r) {
						// Show retreived hashed password from the database
						$pp = "";
						while ($hashed_password = mysqli_fetch_array($r, MYSQLI_BOTH)){
							$pp = $hashed_password["hashed_password"];
						}
						
						// Verify password
						if (password_verify($password,$pp)){
							// Collect customers name from the database
							$sql2 = "DELETE FROM customer_accounts WHERE username='$username'";
							
							// Run the query
							$r2 = mysqli_query($db_connection, $sql2);
							
							// End the session so the user is logged out after account
							// is deleted from the database.
							session_start();
							session_unset();
							session_destroy();
							
							// Forward to the redirect page...
							
							$url = 'delete_redirect.php';
							header('Location: '.$url);
							
						} else {
							// Login failed
							
							$FailedLogins += 1;
							// Display login form again
							?>
							<form method="post" action="delete_account.php">
								<fieldset>
									<legend>DELETE ACCOUNT</legend>
									<label>UserName:  </label><br>
									<input type="username" name="username"><br><br>
									<label>Password:  </label><br>
									<input type="password" name="password"><br><br>
									<?php echo '<p>Log In Not Successful!</p>'; ?>
									<button type="submit" value="Submit">Submit</button><br><br>
								</fieldset>
							</form>
							
							<?php
						}
						
					}
					
					else {
						echo "Error: " . $sql . "<br>" . mysqli_error($db_connection);
					}
					
					mysqli_close($db_connection);
				}
				else {
					echo 'You have exceeded the number of logins';
				} 
			} else {
				// form has not been submitted yet
				?>
				<form method="post" action="delete_account.php">
					<fieldset>
						<legend>DELETE ACCOUNT</legend>
						<label>UserName:  </label><br>
						<input type="username" name="username"><br><br>
						<label>Password:  </label><br>
						<input type="password" name="password"><br><br>
						<button type="submit" value="Submit">Submit</button><br><br>
					</fieldset>
				</form>
				
				<?php
			}
			?>
			
			
        </div>
		
		</center>  
		
    </body>

</html>