<?php
function getDBConnection()
{
   $host = "us-cdbr-iron-east-05.cleardb.net";
     $username = "b253634d031b02";
     $password = "a3d6690d";
     $dbname="heroku_14ce4fd1a99cddb";

// Create connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname1", $username, $password);
    return $conn;
}

?>