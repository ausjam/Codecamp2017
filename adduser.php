<?php

require_once "PHP/formvalidator.php";
require_once "PHP/passhash.php";
session_start();

$servername = "172.23.147.44";
$username = "MemeAdmin";
$password = "VerySecureSuchData";
$dbname = "MemeExchange";
$itemtable = "user_auth";

if(isset($_POST['create']))
{
	$validator = new FormValidator();

	$validator->addValidation("user_name","req","You must enter a username");
	$validator->addValidation("user_password","req","You must enter a password");
	$validator->addValidation("user_password_confirm","req","You must confirm your password");

	$validator->addValidation("user_name","maxlen=20",
			"Your username may not be longer than 20 characters");
	$validator->addValidation("user_password","maxlen=40",
			"Your password may not be longer than 40 characters");
	$validator->addValidation("user_password_confirm","maxlen=40",
			"Your password may not be longer than 40 characters");

	$validator->addValidation("user_name","alnum",
			"Your username may only contain letters and numbers");
	$validator->addValidation("user_password","eqelmnt=user_password_confirm",
			"Your password does not match");
	if($validator->ValidateForm())
	{
		$user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
		$user_password = filter_var($_POST['user_password'], FILTER_SANITIZE_STRING);
		$user_salt = substr(md5(uniqid("",true)),0,20);
		//$user_hash = return_hash($user_password, $user_salt);
		$user_hash = hash('sha256', $user_password); //Temp Fix
		$user_hash .= $user_salt;
		$user_hash = hash('sha256', $user_hash);

		$db = mysqli_connect($servername, $username, $password, $dbname);

		//Checks if username already exists
		$query = "SELECT user_name FROM $itemtable WHERE user_name='$user_name'";
		$result = mysqli_query($db, $query);
		if($result && mysqli_num_rows($result) > 0)
		{
			//Username is taken
			echo 'Username is already taken';
		}
		else
		{
			//Inserts User into database
			$query = "INSERT INTO $itemtable (user_name, user_salt, user_hash)
					VALUES ('$user_name', '$user_salt', '$user_hash')";
			if(!mysqli_query($db, $query))
			{
				echo 'Failed to insert into database';
				//Failed to insert into database
			}
			else
			{
				echo 'Account registered successfully';
				//Success
			}
		}
		mysqli_close($db);
		unset($connection);
	}
	else
	{
		//Form validation failed
	}
}

?>
