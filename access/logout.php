<?php
	
	/**
	 * Initiating session
	 */
	session_start();
	
	
	/**
	 * Condition for redirecting a user once they logout (when they destroy a session)
	 */
	if(session_destroy())
	{
		header("Location: /urlizer/index.html");
	}
?>