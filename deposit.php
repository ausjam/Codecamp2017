
<html>

<?php

include 'tabtop.php';

?>

<?php

$servername = "172.23.147.44";
$username = "MemeAdmin";
$password = "VerySecureSuchData";
$dbname = "MemeExchange";
$itemtable = "pending_deposit";

$loginurl = "login.php";

require_once 'PHP/block_io.php';
require_once 'PHP/auth.php';

session_start();

$authenticator = new UserAuthenticator;
$user_name = $authenticator->user_auth('0');
if($user_name != false)
{
	$apiKey = "d2d4-3de5-2d56-1e0b";
	$version = 2; // API version
	$pin = "hKI86JgYYQgd9cXhljaa";
	$block_io = new BlockIo($apiKey, $pin, $version);

	$db = mysqli_connect($servername, $username, $password, $dbname);

	$query = "SELECT user_name, address FROM $itemtable WHERE user_name='$user_name'";
	$result = mysqli_query($db, $query);
	if($result && mysqli_num_rows($result) > 0)
	{
		mysqli_data_seek($result, 0);
		$address_info = mysqli_fetch_row($result);
		$address = $address_info[1];
	}
	else
	{
		$address_info = $block_io->get_new_address();
		$address = $address_info->data->address;
		$query = "INSERT INTO $itemtable (user_name, address) VALUES ('$user_name', '$address')";
		mysqli_query($db, $query);
		$block_io->create_notification(array('type' => 'https://ExchangeMemes.com/payment_proc.php'));
	}
	mysqli_close($db);
}
else
{
	header("Location: " . $loginurl);
}

?>


	<div class="deposit">
		<h1>Deposit Dogecoin</h1>
<body>
	<img src="http://chart.googleapis.com/chart?chs=125x125&cht=qr&chl=<?php echo $address; ?>">
	<p><?php echo $address; ?></p>
</body>


	</div>
</html>
