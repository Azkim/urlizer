<?php

	session_start(); 
	
	$servername = "localhost";
	$usernamedb = "root";
	$passwordb = "";
	$dbname = "urlizer";

	try {

		if (isset($_POST['submit'])) {
			if (empty($_POST['email']) || empty($_POST['password'])) {
				header("refresh:5; location:/urlizer/home/login.php");
				echo "All fields must be entered correct credentials!";
				echo "<a href=\"/urlizer/index.php\"><p>Go back to Login Page</p></a>";
				echo "<a href=\"/urlizer/home/signup.php\"><p>Go back to Sign Up Page</p></a>";
			}
			else 
			{	
				$email = $_POST['email'];
				$password = $_POST['password'];
				$email = stripslashes($email); /*Stripslash is used in this case for unquoting a quoted string*/
				$setpassword = stripslashes($password); /*Stripslash is used in this case for unquoting a quoted string*/

				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $usernamedb, $passwordb);

				$conn->quote($setpassword); /*quote() has been used here for the purpose of returnning a quoted string that is theoretically safe to pass into an SQL statement. Makes the app immunue to SQL injection*/

	    		$conn->quote($email); /*quote() has been used here for the purpose of returnning a quoted string that is theoretically safe to pass into an SQL statement. Makes the app immunue to SQL injection*/
	    
	    		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $conn->prepare("SELECT * FROM users WHERE email = '$email'"); 

				$stmt->execute();

				$results = $stmt->fetchAll();

      			foreach ($results as $result) {}

      			$passwordhash = $result['password'];

      			$role = $result['role'];

				if(password_verify($setpassword, $passwordhash)) {

					if ($stmt== true) {

						$count = $stmt->rowCount();

						if (($count >= 1)) {
							$_SESSION['login_user'] = $result['firstname'];

						if($role == "Agent"){
								echo "<link href=\"/urlizer/css/loader.css\" rel=\"stylesheet\">";
								echo "<br> <div class=\"loader\"></div>";
					        	header("refresh:2; /urlizer/agent/dashboard.php");
					        }elseif($role == "Admin"){
					        	echo "<link href=\"/urlizer/css/loader.css\" rel=\"stylesheet\">";
								echo "<br> <div class=\"loader\"></div>";
					        	header("refresh:2; /urlizer/admin/dashboard.php");
					        }
					    }
					} 
				} else {
					
					echo "<br>Either you have entered the <b><i>wrong credentials</b></i> or you need to <b><i>sign up</b></i> with us!</br>";
					echo "<br>You will be redirected back to the login page!</br></br>";
					header("refresh:3; /urlizer/home/login.php");
				}
			}
		}		
	}
	
	catch(PDOException $e)
	    {
	    	echo $stmt . "<br>" . $e->getMessage();
	    }

	$conn = null;
		
?>