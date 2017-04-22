<?php


//header('Content-Type: text/html; charset=Windows-1252');


// Set up variables for connection.

$servername = "50.62.209.3:3306";
$username = "MemeAdmin";
$password = "VerySecureSuchData";
$dbname = "MemeExchange";
$itemtable = "StockValues";


// Create connection

$db = mysqli_connect($servername,$username,$password,$dbname)
 or die('Error connecting to MySQL server.');


//Pulls all current stocks down in groups of 25 and stores that information in arrays

$query = "SELECT * FROM StockValues";
mysqli_query($db, $query) or die('Error querying database.');

//Pulls records of unsold items for counting purposes.

$result = mysqli_query($db, $query);

$stockinfo = array();

$rowvar = 0;

while ($row = mysqli_fetch_array($result)) {
//echo $row['IDnumber'] . ' ' . $row['StockName'] . ': ' . $row['StockAbb'] . ' ' . $row['Tradedin'] . ' ' . $row['CurrentValue'] .'<br />';

$stockinfo[$rowvar][0] = $row['IDnumber'];
$stockinfo[$rowvar][1] = $row['StockName'];
$stockinfo[$rowvar][2] = $row['StockAbb'];
$stockinfo[$rowvar][3] = $row['Tradedin'];
$stockinfo[$rowvar][4] = $row['CurrentValue'];

$rowvar++;

}

  //  foreach ($stockinfo) {
  //      echo "Id: {$stock[IDnumber]}<br />"
  //         . "Name: {$stock[StockName]}<br />"
  //         . "Abb: {$stock[StockAbb]}<br />"
  //         . "Tradein: {$stock[Tradedin]}<br />"
  //         . "Value: {$stock[CurrentValue]}<br /><br />";
  //  }
mysqli_close($db);
    ?>
