<!DOCTYPE html>
<html>
<div class="container">
	<head>
		<title>Recover Password</title>
		<!-- Compiled and Minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<!-- compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<link href="/urlizer/css/access.css" rel="stylesheet">
	</head>
	<body class="bodysignup">
		<script>
			$(document).ready(function(){
			    $('[data-toggle="tooltip"]').tooltip();   
			animation: true});
		</script>
		
		<form action="/urlizer/crud/update_reset.php" method="GET" class="form-signup">
			
				<legend><h2 class="form-signup-heading">Reset Password</h2></legend>

				<label for="email" class="sr-only">E-Mail</label>
				<input id="email" name="email" placeholder="E-Mail" type="email" class="form-control" data-toggle="tooltip" data-placement="right" title="Enter the E-Mail which you had used for signing up" required><br>

				<label for="password" class="sr-only">Password</label>
				<input id="password" name="password1" placeholder="Password" type="password" class="form-control" data-toggle="tooltip" data-placement="right" title="The password should not be less than 4 characters" required><br>

				<label for="password" class="sr-only">Re-Type Password</label>
				<input id="password" name="password2" placeholder="Re-Type Password" type="password" class="form-control" data-toggle="tooltip" data-placement="right" title="Re-type the password" required><br>

				<input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">

				<input name="submit" type="submit" value="Recover Password"  class="btn btn-success" style="font-size: 22px; width: 100%;">
		</form>
	</body>
	<!-- </div> -->
</html>

		