<!DOCTYPE html>
<html>
<div class="container">
	<head>
		<title>Reset Link</title>
		<!-- Compiled and Minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<!-- compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<link href="/urlizer/css/access.css" rel="stylesheet">

		<script>
			$(document).ready(function(){
			    $('[data-toggle="tooltip"]').tooltip();
			    	animation: true;

				if(window.location.href.indexOf('#basicModalWarning_2') != -1) {
		            $('#basicModalWarning_2').modal('show');
		        } else if (window.location.href.indexOf('#basicModalWarning') != -1) {
		            $('#basicModalWarning').modal('show');
		        }else if (window.location.href.indexOf('#faultyEmail') != -1) {
		            $('#faultyEmail').modal('show');
		        }else if (window.location.href.indexOf('#successfulResetLink') != -1) {
		            $('#successfulResetLink').modal('show');
		        }
	        });
		</script>

	</head>

	<body class="bodysignup">		
		<form action="/urlizer/crud/reset.php" method="GET" class="form-signup">
			
				<legend><h2 class="form-signup-heading">Forgot your Password?</h2></legend>

				<label for="email" class="sr-only">E-Mail</label>
				<input id="email" name="email" placeholder="E-Mail" type="email" class="form-control" data-toggle="tooltip" data-placement="right" title="Enter the E-Mail which you had used for signing up" required><br>

				<input type="hidden" name="token" value="<?php echo bin2hex(openssl_random_pseudo_bytes(24)); ?>">
				
				<input type="hidden" name="created_at" value="<?php echo $_SERVER['REQUEST_TIME']; ?>">

				<input type="submit" value="Get Reset Link"  class="btn btn-success" style="font-size: 22px; width: 100%;">
		</form>

		<!-- Warning on faulty reset token trigger modal -->
        <div class="modal fade" id="basicModalWarning_2" tabindex="-1" role="dialog" aria-labelledby="basicModalWarning_2" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Faulty Reset Token!</h4>
                </div>
                <div class="modal-body" style="margin-top: -15px">
                    <p style="text-align: center;">The Password Reset Token is Faulty!</p>
                     <div class="modal-footer">
                      <a href="<?php echo "/urlizer/access/reset.php";?>" class="btn btn-danger" style="width: 100%">Back</a>
                    </div> 
                </div>
              </div>
            </div>
        </div>

        <!-- Warning on faulty reset link trigger modal -->
        <div class="modal fade" id="basicModalWarning" tabindex="-1" role="dialog" aria-labelledby="basicModalWarning" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Faulty Reset Link!</h4>
                </div>
                <div class="modal-body" style="margin-top: -15px">
                    <p style="text-align: center;">The Password Reset Link is Faulty!</p>
                     <div class="modal-footer">
                      <a href="<?php echo "/urlizer/access/reset.php";?>" class="btn btn-warning" style="width: 100%">Back</a>
                    </div> 
                </div>
              </div>
            </div>
        </div>

        <!-- Warning on faulty reset email trigger modal -->
        <div class="modal fade" id="faultyEmail" tabindex="-1" role="dialog" aria-labelledby="faultyEmail" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Invalid Reset E-Mail!</h4>
                </div>
                <div class="modal-body" style="margin-top: -15px">
                    <p style="text-align: center;">E-Mail not found on the Database.</p>
                     <div class="modal-footer">
                      <a href="<?php echo "/urlizer/access/reset.php";?>" class="btn btn-danger" style="width: 100%">Back</a>
                    </div> 
                </div>
              </div>
            </div>
        </div>

        <!-- Warning on a successful reset link trigger modal -->
        <div class="modal fade" id="successfulResetLink" tabindex="-1" role="dialog" aria-labelledby="successfulResetLink" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Reset Link Sent!</h4>
                </div>
                <div class="modal-body" style="margin-top: -15px">
                    <p style="text-align: center;">A reset link has been sent to your E-Mail</p>
                     <div class="modal-footer">
                      <a href="<?php echo "/urlizer/access/reset.php";?>" class="btn btn-success" style="width: 100%">Close</a>
                    </div> 
                </div>
              </div>
            </div>
        </div>
	</body>
	</div>
</html>

