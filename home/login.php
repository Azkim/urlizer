<!DOCTYPE html>
<html>
	<div class="container">
		<head>
			<title>Login Form</title>
			<!-- Compiled and Minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

			<!-- jQuery library -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

			<!-- compiled JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

			<link href="/urlizer/css/access.css" rel="stylesheet">
		</head>

		<body>
		<form action="/urlizer/access/login.php" method="post" class="form-signin">
			
				<legend><h2 class="form-signin-heading">Karibu!</h2></legend>

				<label for="email" class="sr-only">E-Mail</label>
				<input id="email" name="email" placeholder="E-Mail" type="email" class="form-control" required><br>

				<label for="Password" class="sr-only">Password</label>
				<input id="password" name="password" placeholder="Password" type="password" class="form-control" required><br>

				<input name="<?php echo $id; ?>" type="hidden"><!-- Not sure why I still need this -->

				<input name="submit" type="submit" value="Login"  class="btn btn-success" style="width:100%;margin-bottom: 3%;"> 
				<a href="<?php echo "/urlizer/access/reset.php";?>" class="btn btn-success" style="width:100%;">Reset Password</a>

			</form>
		</body>
	</div>
</html>