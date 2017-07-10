<!DOCTYPE html>
<html>
<div class="container">
	<head>
		<title>Sign Up</title>
		<!-- Compiled and Minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<!-- compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<link href="/urlizer/css/access.css" rel="stylesheet">
	</head>
	<body class="bodysignup">		
		<form action="/urlizer/crud/signup.php" method="post" class="form-signup">
			
				<legend><h2 class="form-signup-heading">Sign Up Here!</h2></legend>
				<p><i>~ On Successfully Signing Up You Will Be Redirected To The Login Page ~</i></p>

				<label for="name" class="sr-only">First Name</label>
				<input id="name" name="fname" placeholder="First Name" type="text" class="form-control" required><br>

				<label for="name" class="sr-only">Last Name</label>
				<input id="name" name="lname" placeholder="Last Name" type="text" class="form-control" required><br>

				<label for="email" class="sr-only">E-Mail</label>
				<input id="email" name="email" placeholder="E-Mail" type="email" class="form-control" required><br>

				<label for="password" class="sr-only">Password</label>
				<input id="password" name="password1" placeholder="Password" type="password" class="form-control" required><br>

				<label for="password" class="sr-only">Password</label>
				<input id="password" name="password2" placeholder="Re-Type Your Password" type="password" class="form-control" required><br>

				<input id="role" name="user_role" value="Admin" type="hidden"><br>

				<input name="submit" type="submit" value="Sign Up"  class="btn btn-success" style="margin-left:155px;"> 
				<a href="<?php echo "/urlizer/home/login.php";?>" class="btn btn-success">Sign In</a>
		</form>
	</body>
	</div>
</html>

		