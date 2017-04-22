<?php

require_once 'PHP/auth.php';
session_start();

$loginurl = "http://www.ExchangeMemes.com/login.php";

$authenticator = new UserAuthenticator;
if($authenticator->user_auth('0') != false)
{
	//Magic goes here
}
else
{
	header("Location: " . $loginurl);
}

?>
