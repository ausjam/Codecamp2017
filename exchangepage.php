<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Meme Exchange</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
  </head>

  <?php

  include 'includes/tabtop.php';

  include 'includes/getstock.php'

  ?>

<div class="exchangehead">

  <button type="button" name="buybutton"></button>

  <button type="button" name="sellbutton"></button>

</div>

  <body>

<div id="stockpagebuttons" class="stockpages">
  <button onclick="changepage(1)" type="button" name="button"></button>
  <button onclick="changepage(2)" type="button" name="button"></button>
  <button onclick="changepage(3)" type="button" name="button"></button>
  <button onclick="changepage(4)" type="button" name="button"></button>
  <button onclick="changepage(5)" type="button" name="button"></button>
  <button onclick="changepage(6)" type="button" name="button"></button>
</div>



<div class="stocktable">

<!-- php that loads the table goes here -->

</div>





  </body>

  <?php

  include 'includes/footer.php';

  ?>

</html>



 
