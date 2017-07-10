
<?php
	/**
	 * Autoloading of support scripts
	 */
	spl_autoload_register(function ($connect) {
	    include($_SERVER['DOCUMENT_ROOT']. '/urlizer/config_files/dbcons.php');
	});
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password1'];
	$role = $_POST['user_role'];
	$passwordhash = password_hash($password, PASSWORD_DEFAULT); /*password_hash() is used here to create a new password hash using a strong one-way hashing algorithm. password_hash() is compatible with crypt(). */
	$get_pages = isset($_POST['page']) ? $_POST['page'] : 1;

	if(isset($_POST['submit'])){
	
		try {
			if(!empty ($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email'])&& !empty($_POST['user_role'])&& !empty($_POST['password1'])&& 
				!empty($_POST['password2'])&& 
				!empty($_POST['password2'])){
				if(($_POST['password1']) == ($_POST['password2'])) {

					$constant = new DBConstants; /*new object containing all the database variables*/

					$conn = new PDO("mysql:host=$constant->servername;dbname=$constant->dbname", $constant->username, $constant->password);
						    
				    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				    $sql = "INSERT INTO users (firstname,lastname,email,password,role)
				    VALUES ('$fname','$lname','$email','$passwordhash', '$role')";

					$conn->exec($sql);

			        header("Location: /urlizer/admin/users.php?page=$get_pages#basicModalSuccess");
			        die();
						} elseif(($_POST['password1']) !== ($_POST['password2'])) {
							header("Location: /urlizer/admin/users.php?page=$get_pages#basicModalWarning");
						}	
				} 	else {
							header("Location: /urlizer/admin/users.php?page=$get_pages#basicModalWarning2");
					}	
		}   	
		
		catch(PDOException $e)
		
		{
		    
			$error = $e->getMessage();
            echo "
                <!DOCTYPE html>
                    <html lang=\"en\">
                      <head>
                          <meta charset=\"utf-8\">
                          <title>Bad Operation</title>
                              <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                          <link href=\"http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css\" rel=\"stylesheet\">
                          <style type=\"text/css\">
                                .center {text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto;}

                          </style>
                          <script src=\"http://code.jquery.com/jquery-1.11.1.min.js\"></script>
                          <script src=\"http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js\"></script>
                      </head>
                      <body>
                        <div class=\"container\">
                          <div class=\"row\" style=\"margin-top: 100px\">
                            <div class=\"span12\">
                              <div class=\"hero-unit center\">
                                  <h1 ><font face=\"Tahoma\" color=\"red\">Bad Operation</font></h1>
                                  <br />
                                  <p>$error</p>
                                  <p><b>Call +254-774-221122 for Assistance</b></p>
                                  <a href=\"/urlizer/admin/users.php?page=$get_pages\" class=\"btn btn-large btn-info\"><i class=\"icon-home icon-white\"></i> Home</a>
                                </div> 
                            </div>
                          </div>
                        </div>
                      </body>
                    </html>
            ";  
		}

		$conn = null;
	}
	
?>