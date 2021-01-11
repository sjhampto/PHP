<!doctype html>
<html lang="en"> 
    <head>
		<title>Account</title>
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
		
		<main>
            <br>
			<?php
			session_start();
			if(isset($_SESSION["customer_name"])){ ?>
				<p>Welcome, <?php echo $_SESSION["customer_name"]; ?> </p>
				
				<div>
					<a href="#">Purchase History</a>
					<br>
					<a href="update_password.php">Change Password</a>
					<br>
					<a href="#">Update Account Information</a>
					<br>
					<a href="delete_account.php">Delete Account</a>
				</div>
				<?php
			} else {
				echo '<p> Please Login </p>';
			}	
			?>
			<br><br><br>
				
        </main>
		
		</center>  
		
    </body>

</html>