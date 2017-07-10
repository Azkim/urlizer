<?php

	/**
	* Class for displaying the contents of a tables
	*/
	class ShowContents
	{
		
		public function setData_UsersTable(){

			global $id;
			global $firstname;
			global $lastname;
			global $email;
			global $role;
			global $password;

			$conn = new PDO("mysql:host=localhost;dbname=urlizer", "root","");
	      
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $conn->prepare("SELECT * FROM users");

			$stmt->execute();

			$results = $stmt->fetchAll();

			foreach ($results as $result) {}

			$id=$result['id'];
			$firstname=$result['firstname'];
			$lastname=$result['lastname'];
			$email=$result['email'];
			$role=$result['role'];
			$password=$result['password'];
		}

		public function setData_ResetTable(){

			global $token;
			global $email;
			global $created_at;

			$conn = new PDO("mysql:host=localhost;dbname=urlizer", "root","");
	      
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $conn->prepare("SELECT * FROM reset");

			$stmt->execute();

			$results = $stmt->fetchAll();

			foreach ($results as $result) {}

			$token=$result['token'];
			$email=$result['email'];
			$created_at=$result['created_at'];
		}
	}

	$users_data = new ShowContents();
	
	$users_data->setData_UsersTable();
	$users_data->setData_ResetTable();
?>