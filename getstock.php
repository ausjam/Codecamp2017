<?php


//header('Content-Type: text/html; charset=Windows-1252');


// Set up variables for connection.

$servername = "50.62.209.3:3306";
$username = "ausjam";
$password = "Aj67!2rt";
$dbname = "AAItems";
$itemtable = "AcheivingAnaheimItemTable";


// Create connection


$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" , $mysqli->connect_errno , ") " , $mysqli->connect_error;
};


//Pulls all current stocks down in groups of 25 and stores that information in arrays



//Pulls records of unsold items for counting purposes.


$query = "SELECT Item_Sold FROM AcheivingAnaheimItemTable WHERE Item_Sold=0";
if ($stmt = $mysqli->prepare($query)) {

 // execute query
    $stmt->execute();

 // store result
    $stmt->store_result();

    $unsold = ($stmt->num_rows);

 // close statement
    $stmt->close();
};
