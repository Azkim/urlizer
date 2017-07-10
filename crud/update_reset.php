<?php

	$_token = $_GET['token'];
	$email = $_GET['email'];
	$password1 = $_GET['password1'];
	$password2 = $_GET['password2'];

	$servername = "localhost";
	$usernamedb = "root";
	$passwordb = "";
	$dbname = "urlizer";

	if ($password1 == $password2) {

		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $usernamedb, $passwordb);

	    $hashed_password = password_hash($password1, PASSWORD_DEFAULT);

	    $stmt = $conn->prepare("UPDATE users SET password = '$hashed_password'
								WHERE email = '$email'");
		$stmt->execute();

		header("Location:/urlizer/crud/pro_delete_reset.php?token=".urlencode("$_token"));

	} else {
		echo "Password reset unsuccesful";
		
	}
?>