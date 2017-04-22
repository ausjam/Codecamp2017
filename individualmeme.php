
<html>

<?php

include 'tabtop.php';

?>

<body>

<?php

// Set up variables for connection.

$servername = "50.62.209.3:3306";
$username = "MemeAdmin";
$password = "VerySecureSuchData";
$dbname = "MemeExchange";
$itemtable = "StockValues";


$memeab = htmlspecialchars($_GET["sn"]);


// Create connection

$db = mysqli_connect($servername,$username,$password,$dbname)
 or die('Error connecting to MySQL server.');


//Pulls all current stocks down in groups of 25 and stores that information in arrays

$query = "SELECT * FROM StockValues WHERE StockAbb = '$memeab'";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);

$memeinfo = array();

$rowvar = 0;

while ($row = mysqli_fetch_array($result)) {

$memeinfo[$rowvar][0] = $row['IDnumber'];
$memeinfo[$rowvar][1] = $row['StockName'];
$memeinfo[$rowvar][2] = $row['StockAbb'];
$memeinfo[$rowvar][3] = $row['Tradedin'];
$memeinfo[$rowvar][4] = $row['CurrentValue'];
$memeinfo[$rowvar][5] = $row['AmountChange'];
$memeinfo[$rowvar][6] = $row['PercentChange'];

}

mysqli_close($db);

    ?>




    <div class="stocktable">

    <!-- php that loads the table goes here -->

    <table id="mainstockstats"> <!-- This table will hold the meme stock values -->

      <tr> <!-- This row is for table headers -->
        <th>ID number</th> <!-- This row is for ID number -->
        <th>Stock Name</th> <!-- This row is for StockName -->
        <th>Stock Abr</th> <!-- This row is for StockAbb -->
        <th>Traded In</th> <!-- This row is for Tradedin -->
        <th>Last Value</th> <!-- This row is for CurrentValue -->
        <th>Amount Change</th> <!-- This row is for CurrentValue -->
        <th>Percent Change</th> <!-- This row is for CurrentValue -->

      </tr>

    <?php

     echo '<tr>

       <td>' . $memeinfo[$rowvar][0] . '</td>
       <td>' . $memeinfo[$rowvar][1] . '</td>
       <td>' . $memeinfo[$rowvar][2] . '</td>
       <td>' . $memeinfo[$rowvar][3] . '</td>
       <td>' . $memeinfo[$rowvar][4] . '</td>
       <td>' . $memeinfo[$rowvar][5] . '</td>
       <td>' . $memeinfo[$rowvar][6] . '</td>


     </tr>';


     ?>
   </table>

   </div>

<?php

echo '

<div>
  <img src="https://www.google.com/search?tbm=isch&q=' . $memeinfo[$rowvar][1] .'" alt="">
</div>' ?>

  </body>



  <?php

  include 'footer.php';

  ?>

</html>
