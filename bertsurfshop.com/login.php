<!doctype html>
<html lang="en"> 
    <head>
		<title>Log In</title>
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
		
		<div class="logInHolder">
            <br>
			
			<?php
			// Create a counter for unsuccessful logins
			$FailedLogins = 0;
			session_start();
			session_unset();
			session_destroy();
			
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
						// Initialize $pp to avoid variable error if password info is
						// entered wrong.
						$pp = "";
						// Show retreived hashed password from the database
						
						while ($hashed_password = mysqli_fetch_array($r, MYSQLI_BOTH)){
							$pp = $hashed_password["hashed_password"];
						}
						
						// Verify password
						if (password_verify($password,$pp)){
							// Collect customers name from the database
							$sql2 = "SELECT firstName FROM customer_accounts WHERE username='$username'";
							
							// Run the query
							$r2 = mysqli_query($db_connection, $sql2);
							
							// Store the customer's name
							$customer_name = mysqli_fetch_array($r2, MYSQLI_BOTH);
							
							// Put username into the session...
							session_start();
							$_SESSION["customer_name"] = $customer_name["firstName"];
							
							// Forward to the customer page...
							
							$url = 'customerAccount.php';
							header('Location: '.$url);
							
						} else {
							// Login failed
							
							$FailedLogins += 1;
							// Display login form again
							?>
							<form method="post" action="login.php">
								<fieldset>
									<legend>Login</legend>
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
				<form method="post" action="login.php">
					<fieldset>
						<legend>Login</legend>
						<label>UserName:  </label><br>
						<input type="username" name="username"><br><br>
						<label>Password:  </label><br>
						<input type="password" name="password"><br><br>
						<?php 
						
						
						?>
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