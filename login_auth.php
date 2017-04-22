<?php

require_once "PHP/formvalidator.php";
require_once "PHP/passhash.php";
session_start();

$servername = "50.62.209.3:3306";
$username = "MemeAdmin";
$password = "VerySecureSuchData";
$dbname = "MemeExchange";
$itemtable = "user_auth";

if(isset($_POST['login']))
{
	$validator = new FormValidator();

	$validator->addValidation("user_name","req","You must enter a username");
	$validator->addValidation("user_password","req","You must enter a password");

	$validator->addValidation("user_name","maxlen=20",
			"Your username may not be longer than 20 characters");
	$validator->addValidation("user_password","maxlen=40",
			"Your password may not be longer than 40 characters");

	$validator->addValidation("user_name","alnum",
			"Your username may only contain letters and numbers");
	if($validator->ValidateForm())
	{
		$user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
		$user_password = filter_var($_POST['user_password'], FILTER_SANITIZE_STRING);

		$db = mysqli_connect($servername, $username, $password, $dbname);

		$query = "SELECT user_salt, user_hash FROM $itemtable WHERE user_name='$user_name'";
		$result = mysqli_query($db, $query);
		if($result && mysqli_num_rows($result) > 0)
		{
			mysqli_data_seek($result, 0);
			$user_info = mysqli_fetch_row($result);
			$user_salt = $user_info[0];
			$user_hash = $user_info[1];

			//$user_hash = return_hash($user_password, $user_info[0]));
			$test_hash = hash('sha256', $user_password); //Temp Fix
			$test_hash .= $user_salt;
			$test_hash = hash('sha256', $test_hash);

			//echo $test_hash;
			//echo $user_hash;

			if($test_hash == $user_hash)
			{
				$auth_token = hash("sha512",uniqid("",true));

				$query = "UPDATE $itemtable SET auth_token = '$auth_token' WHERE
						user_name='$user_name'";
				mysqli_query($db, $query);
				setcookie("auth_token", $auth_token);

				echo 'Logged in Successfully';
				//Login Successful
			}
		}
		else
		{
			echo 'Username or Passsword is incorrect';
			//No user registered with that name
		}
	}
	else
	{
		//Form validation failed
	}
}

?>
