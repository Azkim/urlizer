<?php
	/**
	 * Autoloading of support scripts
	 */
	spl_autoload_register(function ($connect) {
	    include($_SERVER['DOCUMENT_ROOT']. '/urlizer/config_files/dbcons.php');
	});
	
	$email = $_GET['email'];
	$token = $_GET['token'];
	$created_at = $_GET['created_at'];

	if(empty($_GET['submit'])){
	
		try {
			
			$constant = new DBConstants; /*new object containing all the database variables*/

			$conn = new PDO("mysql:host=$constant->servername;dbname=$constant->dbname", $constant->username, $constant->password);
				    
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		    $stmt = $conn->prepare("SELECT * FROM users WHERE email = '$email'");

			$stmt->execute();

			$result = $stmt->fetchall();

			if ($result[0]) {

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
							<p>Your password reset link will expire in 60 minutes.</p>
						</body>
					</html>
				";

				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				mail($to,$subject,$message,$headers);
				header("Location: /urlizer/access/reset.php#successfulResetLink");
			}else{
				header("Location: /urlizer/access/reset.php#faultyEmail");
			}
		}   	
		
		catch(PDOException $e){

			$error = $e->getMessage();
            echo "
                <!DOCTYPE html>
                    <html lang=\"en\">
                      <head>
                          <meta charset=\"utf-8\">
                          <title>Bad Operation</title>
                              <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                          <link href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" rel=\"stylesheet\">
                          <style type=\"text/css\">
                                .center {text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto;}

                          </style>
                          <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
                          <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
                      </head>
                      <body>
	                      <div class=\"container\"  style=\"margin-top: 100px;text-align:center;font-family: Tahoma;\">
	                        <div class=\"jumbotron\">
                              <h1 style = \"font-size:90px;color:red\">Bad Operation</font></h1>
                              <p>$error</p>
                              <p><b>Call +254-774-221122 for Assistance</b></p>
                              <a href=\"/urlizer/home/login.php\" class=\"btn btn-lg btn-primary\"><i class=\"glyphicon glyphicon-home\"></i> Home</a>
	                        </div>
	                      </div>
                      </body>
                    </html>
            ";  
        }

		$conn = null;
	}
	
?>

