<!DOCTYPE html>
<html>

  <?php

  include 'tabtop.php';

  include 'getstock.php';

  ?>

<div class="exchangehead">

  <button type="button" name="buybutton">Buy</button>

  <button type="button" name="sellbutton">Sell</button>

</div>

  <body>



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

$inc = 0;


  //for(inc = 0; $rowvar>inc<=24; inc++){

  $endofstream = $rowvar;

  for($inc = 0; $inc<$endofstream; $inc++){

  echo '<tr>

    <td>' . $stockinfo[$inc][0] . '</td>
    <td>' . $stockinfo[$inc][1] . '</td>
    <td>' . $stockinfo[$inc][2] . '</td>
    <td>' . $stockinfo[$inc][3] . '</td>
    <td>' . $stockinfo[$inc][4] . '</td>
    <td>' . $stockinfo[$inc][5] . '</td>
    <td>' . $stockinfo[$inc][6] . '</td>


  </tr>';

  }

?>





  </table>



</div>





  </body>

  <?php

  include 'footer.php';

  ?>



</html>
