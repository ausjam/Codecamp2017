<?PHP

$servername = "172.23.147.44";
$username = "MemeAdmin";
$password = "VerySecureSuchData";
$dbname = "MemeExchange";
$itemtable = "pending_deposit";

require_once 'PHP/block_io.php';
session_start();

if(isset($_POST['notification_id']))
{
	$notid = $_POST['notification_id'];

	$payment_info = $_POST['data'];
	$address = $payment_info->address;
	$deposit = $payment_info->amount_received;

	$db = mysqli_connect($servername, $username, $password, $dbname);
	$query = "SELECT user_name FROM $itemtable WHERE address='$address'";
	$result = mysqli_query($db, $query);
	if($result && mysqli_num_rows($result) > 0)
	{
		$user_name = mysqli_fetch_row($result);

		$query = "SELECT balance FROM user_auth WHERE user_name='$user_name'";
		$result = mysqli_query($db, $query)[0];
		$balance = mysqli_fetch_row($result)[0];
		$balance += $deposit;

		$query = "UPDATE user_auth set balance = '$balance' WHERE user_name = '$user_name'"
	}
	$block_io->delete_notification(array('notification_id' => $notid));
}

?>
