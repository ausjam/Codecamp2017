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

<div id="stockpagebuttons" class="stockpages">
  <button onclick="changepage(0)" type="button" name="button">1</button>
  <button onclick="changepage(25)" type="button" name="button">2</button>
  <button onclick="changepage(50)" type="button" name="button">3</button>
  <button onclick="changepage(75)" type="button" name="button">4</button>
  <button onclick="changepage(100)" type="button" name="button">5</button>
  <button onclick="changepage(125)" type="button" name="button">6</button>
</div>



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

  for($inc = 0; $inc<=24; $inc++){

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



  <script type="text/javascript">

  function changepage(pagenum) {

  //put the next set of data into a variable

  //change the inner html to the new set of data

  var inc = pagenum;
  var lim = pagenum + 24;
  var len = <?php $rowvar ?>;


    for(inc = pagenum; len>inc<=lim; inc++){

    <tr>

      <td> + <?php $stockinfo[inc][0] ?> + </td>
      <td> + <?php $stockinfo[inc][1] ?> + </td>
      <td> + <?php $stockinfo[inc][2] ?> + </td>
      <td> + <?php $stockinfo[inc][3] ?> + </td>
      <td> + <?php $stockinfo[inc][4] ?> + </td>
      <td> + <?php $stockinfo[inc][5] ?> + </td>
      <td> + <?php $stockinfo[inc][6] ?> + </td>


    </tr> = "String1";

    }


  document.getElementById("Mainstockstats").innerHTML = String1;


  }

  </script>



</html>
