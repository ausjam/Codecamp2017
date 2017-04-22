<html>

<?php

include 'tabtop.php';

?>


<body>

    <!-- The body contains all the information on the main page -->

<div class="accountquote">
  
<br>

<p>"Price is what you pay; value is what you get.
	Whether we're talking about stocks or memes,
	I like buying quality content when it is marked down."
	 - A Great Man</p>

</div>

<h1>Welcome to the Meme Stock Exchange, Please Enjoy Your Stay!</h1>

<div class="mainstockdisplay">

<!-- This Div is for Major Memes Stock listing -->



<table> <!-- This table will hold the meme stock values -->

  <tr> <!-- This row is for table headers -->
    <th>ID number</th> <!-- This row is for ID number -->
    <th>Stock Name</th> <!-- This row is for StockName -->
    <th>Stock Abr</th> <!-- This row is for StockAbb -->
    <th>Traded In</th> <!-- This row is for Tradedin -->
    <th>Last Value</th> <!-- This row is for CurrentValue -->
    <th>Amount Change</th> <!-- This row is for CurrentValue -->
    <th>Percent Change</th> <!-- This row is for CurrentValue -->

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



$query = "SELECT * FROM StockValues WHERE IDnumber <= 3";
mysqli_query($db, $query) or die('Error querying database.');



$result = mysqli_query($db, $query);

while ($row = mysqli_fetch_array($result)) {
//echo $row['IDnumber'] . ' ' . $row['StockName'] . ': ' . $row['StockAbb'] . ' ' . $row['Tradedin'] . ' ' . $row['CurrentValue'] .'<br />';

echo

'<tr>

  <td>' . $row['IDnumber'] . '</td>
  <td>' . $row['StockName'] . '</td>
  <td>' . $row['StockAbb'] . '</td>
  <td>' . $row['Tradedin'] . '</td>
  <td>' . $row['CurrentValue'] . '</td>
  <td>' . $row['AmountChange'] . '</td>
  <td>' . $row['PercentChange'] . '</td>


</tr>';

}

mysqli_close($db);

 ?>

</table>

</div>



<div class="aboutsection">

<!-- This div is for a brief description of what this site is and how it works -->

<h1>What is the Meme Stock Exchange?</h1>

<p></p>

</div>



  </body>



<?php

include 'footer.php';

?>



</html>
