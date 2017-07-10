<?php 

include($_SERVER['DOCUMENT_ROOT']. '/urlizer/access/session.php');

if(!$logged_in_user){
	echo "<br>You need to login first, so we are redirecting you back to the Login page!</br></br>";
	header("refresh:3; /urlizer/login.php");
	}else{ ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Agent</title>
	</head>
	<body>
		<p>You are agent: <b><i><?php if ($logged_in_user) {
			echo $logged_in_user;
		}  ?></b></i></p>
		<p><a href="<?php echo "/urlizer/access/logout.php"; ?>">Logout</a></p>
	</body>
</html>

<?php } ?>