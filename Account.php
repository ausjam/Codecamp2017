<html>

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

<?php

include 'tabtop.php';

?>

<div class="accountquote">

<p>"Price is what you pay; value is what you get.
	Whether we're talking about stocks or memes,
	I like buying quality content when it is marked down."
	 - A Great Man</p>

</div>

<div class="accountcontainer">

</div>

<div class="graphs">



</div>

<div class="portfolio">



</div>

<div class="acctotals">

<p>Account ------</p>

<p>Current Account Balance</p>

<p>Current Highest Stock</p>

<p>Total Investment</p>

<p>Submit a Meme</p>

</div>

</div>

</body>

<?php

include 'footer.php';

?>

</html>
