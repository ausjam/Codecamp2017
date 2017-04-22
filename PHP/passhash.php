<?php

function return_hash($to_hash, $salt)
{
	$hash = hash('sha256', $to_hash);
	$hash .= $salt;
	$hash = hash('sha256', $hash);
	return $hash;
}

?>
