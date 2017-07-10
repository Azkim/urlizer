<?php
	/**
	 * Autoloading of support scripts
	 */
	spl_autoload_register(function ($connect) {
	    include($_SERVER['DOCUMENT_ROOT']. '/urlizer/config_files/dbcons.php');
	});
	
	$token = $_GET['token'];
	$email = $_GET['email'];
	$created_at = $_GET['created_at'];

	try {
			
		$constant = new DBConstants; /*new object containing all the database variables*/

		$conn = new PDO("mysql:host=$constant->servername;dbname=$constant->dbname", $constant->username, $constant->password);
			    
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $stmt = $conn->prepare("INSERT INTO reset (token,email,created_at)
    			VALUES ('$token','$email',UNIX_TIMESTAMP('$created_at'))");

		$stmt->execute();

		$domain = $_SERVER['SERVER_NAME'];
		$port = $_SERVER['SERVER_PORT'];
	    $url = "http://".$domain.":".$port."/urlizer/access/token.php?email=$email&created_at=$created_at&token=$token";

		$to = $email;

		$subject = "Password Reset";

		$message = "
			<html>
				<head>
					<title>Password Reset</title>
				</head>
				<body>
					<p>Click on the provided link to reset your password: $url</p>
					<p>Your password will expire in 60 minutes.</p>
				</body>
			</html>
		";

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		mail($to,$subject,$message,$headers);

		echo "<br>A password reset link has been sent to <b><i>".$email."!</b></i><br><br>";
		echo "<br>You will be redirected back to the Login page!</br></br>";
		header("refresh:3; /urlizer/home/login.php");
	}   	
	
	catch(PDOException $e){

		if ($e == true){
			echo "<br>Invalid token!<br>";
			echo "You will be redirected back to the password reset page!</br></br>";
			header("refresh:5; /urlizer/access/reset.php");
	    }
	}

	$conn = null;
?>