<?PHP

class UserAuthenticator
{
	//$servername = "50.62.209.3:3306";
	//$username = "MemeAdmin";
	//$password = "VerySecureSuchData";
	//$dbname = "MemeExchange";
	//$itemtable = "user_auth";

	function user_auth($req_user_type)
	{
		if(isset($_COOKIE['auth_token']))
		{
			$cookie_token = filter_var($_COOKIE['auth_token'], FILTER_SANITIZE_STRING);
			$db = mysqli_connect("50.62.209.3:3306", "MemeAdmin",
					"VerySecureSuchData", "MemeExchange");

			$query = "SELECT user_name, user_type FROM user_auth WHERE auth_token='$cookie_token'";
			$result = mysqli_query($db, $query);
			mysqli_close($db);

			if($result && mysqli_num_rows($result) > 0)
			{
				mysqli_data_seek($result, 0);
				$user_info = mysqli_fetch_row($result);
				$user_name = $user_info[0];
				$user_type = $user_info[1];
				if($user_type >= $req_user_type)
				{
					return $user_name;
				}
				else
				{
					return false;
				}

				echo $user_type;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
}

?>
