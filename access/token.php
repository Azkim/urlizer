<?php
	ini_set("date.timezone", "Africa/Nairobi");/*Very vital: */	
	$servername = "localhost";
	$usernamedb = "root";
	$passwordb = "";
	$dbname = "urlizer";

	if (isset($_GET["token"]) && preg_match('/[A-Za-z][0-9]/', $_GET["token"])) {
	    
	    $_token = $_GET["token"];

	    $_email = $_GET["email"];

	    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $usernamedb, $passwordb);

	    $stmt = $conn->prepare("SELECT * FROM reset WHERE token = '$_token'"); 

		$stmt->execute();

		$results = $stmt->fetchAll();

		if($results[0]){
			$set_email = $results[0]['email'];
			$set_token = $results[0]['token'];
			$start_time = strtotime($results[0]['created_at']);
			$end_time = $_SERVER["REQUEST_TIME"];					
			$time = 3600;

			if (($end_time - $start_time) > $time) {	
				header("Location:/urlizer/crud/delete_reset.php?token=".urlencode("$_token"));
			}else{
				header("Location:/urlizer/reset/recover.php?token=".urlencode("$_token"));
			}
		} else {
            header("Location: /urlizer/access/reset.php#basicModalWarning");
		}

		/*$set_email = $results[0]['email'];
		$set_token = $results[0]['token'];
		$start_time = strtotime($results[0]['created_at']);
		$end_time = $_SERVER["REQUEST_TIME"];					
		$time = 3600;

		echo $set_email.'<br>';
		echo $set_token.'<br>';
		echo $start_time.'<br>';
		echo $end_time.'<br>';
		echo $time.'<br>';
		echo ($end_time - $start_time).'<br>';*/

	}
	else {
	 	header("Location: /urlizer/access/reset.php#basicModalWarning_2");
	}

?>