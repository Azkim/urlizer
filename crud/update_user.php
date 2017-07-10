<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "urlizer";

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $id = $_POST['userid'];
    $get_pages = $_POST['page']; 

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE users SET firstname='$firstname',lastname='$lastname',email='$email',role='$role'
                WHERE id='$id'";

        // Prepare statement
        $stmt = $conn->prepare($sql);

        // execute the query
        $stmt->execute();

        $get_pages = isset($_POST['page']) ? $_POST['page'] : 1;
        header("Location: /urlizer/admin/users.php?page=$get_pages#basicModalSuccess");

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
    
?>