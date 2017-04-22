<?php

$servername = "50.62.209.3:3306";
$username = "MemeAdmin";
$password = "VerySecureSuchData";
$dbname = "MemeExchange";
$itemtable = "pending_deposit";

//require_once 'PHP/block_io.php';
require_once 'PHP/auth.php';

if (!extension_loaded('gmp')) {
    //throw new \Exception('GMP extension seems not to be installed');
	echo 'gmp';
}

if (!extension_loaded('mcrypt')) {
    //throw new \Exception('mCrypt extension seems not to be installed');
	echo 'mcrypt';
}

if (!extension_loaded('curl')) {
    //throw new \Exception('cURL extension seems not to be installed');
	echo 'curl';
}

session_start();

//$authenticator = new UserAuthenticator;
//$user_name = $authenticator->user_auth('0');
//if($user_name != false)
//{
//	echo 'RAWR';
/*	$apiKey = "d2d4-3de5-2d56-1e0b";
	$version = 2; // API version
	$pin = "hKI86JgYYQgd9cXhljaa";
	$block_io = new BlockIo($apiKey, $pin, $version);

	$db = mysqli_connect($servername, $username, $password, $dbname);

	$query = "SELECT user_name, address FROM $itemtable WHERE user_name='$user_name'";
	$result = mysqli_query($db, $query);
	if($result && mysqli_num_rows($result) > 0)
	{
		mysqli_data_seek($result, 0);
		$address_info = mysqli_fetch_row($db, $query);
		$address = $address_info[1];
	}
	else
	{
		$address_info = $block_io->get_new_address();
		$address = $address_info->data->address;
		$query = "UPDATE $itemtable (user_name, address) VALUES ('$user_name', '$address')";
		mysqli_query($db, $query);
	}
	mysqli_close($db);*/
//}
//else
//{
//	header("Location: " . $loginurl);
//}

?>
