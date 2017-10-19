<?php
// connect to our mysql database server

function getDatabaseConnection() {
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b253634d031b02";
    $password = "a3d6690d";
    $dbname = "heroku_14ce4fd1a99cddb"; 
    
    
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}





?>