<!doctype html>
<html lang="en"> 
    <head>
		<title>Sign Up</title>
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
		
		<div class="aboutHolder">
			<div class="contactFormHolder">
				<center>
				<p>
					<form method="post" action="insertCustomerAccount.php">
						<fieldset>
							<legend>Sign Up</legend>
							<label>First Name: </label><br>
							<input type="text" name="fname" ><br><br>
							<label>Last Name:  </label><br>
							<input type="text" name="lname"><br><br>
							<label>Email:  </label><br>
							<input type="email" name="email"><br><br>
							<label>Phone:  </label><br>
							<input type="phone" name="phone"><br><br>
							<label>UserName:  </label><br>
							<input type="username" name="username"><br><br>
							<label>Password:  </label><br>
							<input type="password" name="password"><br><br>
							
							<button type="submit" value="Submit">Submit</button><br><br>
						</fieldset>
					</form>
				</p>
				</center>
			</div>
		</div>
		
		
		
		</center>
		
	
        
    </body>

</html>