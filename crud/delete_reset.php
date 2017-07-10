<?php

	$_token = $_GET['token'];

	$servername = "localhost";
	$usernamedb = "root";
	$passwordb = "";
	$dbname = "urlizer";

	if ($_token) {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $usernamedb, $passwordb);

	    $stmt = $conn->prepare("DELETE FROM reset WHERE token = '$_token'"); 

		$stmt->execute();
		echo "<br>The password reset link has expired!</br>";
		echo "<link href=\"/urlizer/css/loader.css\" rel=\"stylesheet\">";
		echo "<br> <div class=\"loader\"></div>";
    	header("refresh:2; /urlizer/access/reset.php");
	} else{
		echo "Delete unsuccessful";
	}
?>