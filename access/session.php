<?php
	
	/**
	 * Initiating session
	 */
	session_start();

	/**
	 * Storing the firstname of a logged in user into a session variable. 
	 * This variable is later on used throughout the app as a user-validation session variable.
	 */
	$logged_in_user = $_SESSION['login_user'];
	
?>