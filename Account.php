<?php

session_start();

$loginurl = "http://www.ExchangeMemes.com/login.php";

$servername = "50.62.209.3:3306";
$username = "MemeAdmin";
$password = "VerySecureSuchData";
$dbname = "MemeExchange";
$itemtable = "user_auth";

if(isset($_COOKIE['auth_token']))
{
	$db = mysqli_connect($servername, $username, $password, $dbname);
	$cookie_token = filter_var($_COOKIE['auth_token'], FILTER_SANITIZE_STRING);

	//echo $cookie_token;

	$query = "SELECT user_name FROM $itemtable WHERE auth_token='$auth_token'";
	$result = mysqli_query($db, $query);
	mysqli_close($db);
	if($result && mysqli_num_rows($result) > 0)
	{
		mysqli_data_seek($result, 0);
		$auth_token = mysqli_fetch_row($result);
		if($auth_token[0] == $cookie_token)
		{
			//Page goes here... I think.
		}
		else
		{
			echo 'fail';
			header("Location: " . $loginurl);
		}
	}
}
else
{
	echo 'fail';
	header("Location: " . $loginurl);
}

?>
