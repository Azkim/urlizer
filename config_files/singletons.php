<?php
	
	spl_autoload_register(function ($connect) {
	    include($_SERVER['DOCUMENT_ROOT']. '/urlizer/config_files/dbcons.php');
	});

	/**
	 * Class for creating the primary database
	 */
	class DatabaseCreate

	{	
		/**
		 * Method for creating a database
		 */
		public function create_database(){

			try {
				
				$constant = new DBConstants;

	            $conn = new PDO("mysql:host=$constant->servername", $constant->username, $constant->password);

	            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	            $sql = "CREATE DATABASE urlizer";

	            $conn->exec($sql);

	            echo "<br>The primary database for the <b><i>Urlizer System</b></i> has been successfully created! <br>";
            }

            catch(PDOException $e)
            {
            
	            echo  "<br>" . $e->getMessage();
	        }

    		$conn = null;
		}

	}

	/**
	* Class for creating tables
	*/
	class TableCreate
		
	{
		/**
		 * Method for creating users table
		 */

		public function create_users_table(){

			try {

		            $constant = new DBConstants;

		            $conn = new PDO("mysql:host=$constant->servername;dbname=$constant->dbname", $constant->username, $constant->password);
		            
		            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		            
		            $sql = "CREATE TABLE users(
		            	id int(10) NOT NULL AUTO_INCREMENT,
		                firstname varchar(255) NOT NULL,
		                lastname varchar(255) NOT NULL,
		                email varchar(255) NOT NULL UNIQUE,
		            	password varchar(255) NOT NULL,
		                role varchar(255) NOT NULL,
		            	PRIMARY KEY (id)
		            )";

		            $conn->exec($sql);
		            
		            echo "<br>The <b><i>Users</b></i> table has been successfully created! <br>";
		        }
		            catch(PDOException $e)
		        {
		            echo  "<br>" . $e->getMessage();
		        }

		    $conn = null;

		}

		/**
		 * Method for creating campaigns table
		 */

		public function create_campaigns_table(){

			try {
		            $constant = new DBConstants;

		            $conn = new PDO("mysql:host=$constant->servername;dbname=$constant->dbname", $constant->username, $constant->password);
		            
		            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		            
		            $sql = "CREATE TABLE campaigns (
		            	id varchar(255) NOT NULL DEFAULT '0',
		            	campaign_date date NOT NULL,
		                native_url varchar(255) NOT NULL,
		                campaign_source varchar(255) NOT NULL,
		                campaign_medium varchar(255) NOT NULL,
		                campaign_name varchar(255) NOT NULL,
		                optimised_url varchar(255) NOT NULL,
		                created_by varchar(255) NOT NULL,
		                updated_at  TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		            	PRIMARY KEY (id),
		                FOREIGN KEY (created_by) REFERENCES users(email) ON DELETE CASCADE ON UPDATE CASCADE
		            )";

		            $conn->exec($sql);
		            
		            echo "<br>The <b><i>Campaigns</b></i> table has been successfully created! <br>";
				}
		            catch(PDOException $e)
		        {
		            echo  "<br>" . $e->getMessage();
		        }

		    $conn = null;

		}

		public function create_reset_table(){

			try {
		            $constant = new DBConstants;

		            $conn = new PDO("mysql:host=$constant->servername;dbname=$constant->dbname", $constant->username, $constant->password);
		            
		            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		            
		            $sql = "CREATE TABLE reset (
		            	token varchar(255) NOT NULL,
		            	email varchar(255) NOT NULL,
		                created_at TIMESTAMP,
		            	PRIMARY KEY (token)
		            )";

		            $conn->exec($sql);
		            
		            echo "<br>The <b><i>Reset</b></i> table has been successfully created! <br>";
				}
		            catch(PDOException $e)
		        {
		            echo  "<br>" . $e->getMessage();
		        }

		    $conn = null;

		}
	
	}

	$database_create = new DatabaseCreate;
	$database_create->create_database();

	$table_create = new TableCreate;
	$table_create->create_users_table();
	$table_create->create_campaigns_table();
	$table_create->create_reset_table();

    echo "<a href=\"/urlizer/home/signup.php\"><p>Go To Sign Up Page</p></a>";


?>