<html>

<?php

require_once 'PHP/auth.php';
session_start();

$loginurl = "login.php";

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



<div class="portfolio">

<!-- this will echo all the users owned stock -->

<div class="mainstockdisplay">

<!-- This div is used for account stock totals -->

<table> <!-- This table will hold the meme stock values -->

  <tr> <!-- This row is for table headers -->
    <th>Stock</th> <!-- This row is for stock names -->
    <th>Amount Owned</th> <!-- This row is for amount of stock owned -->

  </tr>

<!-- This row and following rows will be individual memes stock listings -->
 <?php

// Set up variables for connection.

$servername = "50.62.209.3:3306";
$username = "MemeAdmin";
$password = "VerySecureSuchData";
$dbname = "MemeExchange";
$itemtable = "StockValues";

// Create connection

$db = mysqli_connect($servername,$username,$password,$dbname)
 or die('Error connecting to MySQL server.');

$query = "SELECT StockAbb, shares FROM stock_amount WHERE user_name = $user_name";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);

while ($row = mysqli_fetch_array($result)) {
//echo $row['IDnumber'] . ' ' . $row['StockName'] . ': ' . $row['StockAbb'] . ' ' . $row['Tradedin'] . ' ' . $row['CurrentValue'] .'<br />';

echo

'<tr>

  <td>' . $row['StockAbb'] . '</td>
  <td>' . $row['shares'] . '</td>

</tr>';

}

mysqli_close($db);

 ?>

</table>

</div>

</div>

<div class="graphs">

<!-- this will show the portfolio in a visual format -->

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
