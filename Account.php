<?php

require_once 'PHP/auth.php';
session_start();

$loginurl = "http://www.ExchangeMemes.com/login.php";

$authenticator = new UserAuthenticator;
$user_name = $authenticator->user_auth('0');
if($user_name != false)
{
	//Magic goes here
}
else
{
	header("Location: " . $loginurl);
}

?>
