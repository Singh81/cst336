<?php
//function to connect to a mySQL db server

function getDBConnection(){
    // $host = "us-cdbr-iron-east-05.cleardb.net";
    // $user = "b724345846f34e";
    // $pass = "958d7a51";
    // $dbname = "heroku_90e40dfb232c3c6";
    
    //make connection
    // $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    // $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // return $dbConn;
    //b724345846f34e:958d7a51@us-cdbr-iron-east-05.cleardb.net/heroku_90e40dfb232c3c6?reconnect=true
    
    $host = "localhost";
     $username = "root";
     $password = "cst336";
     $dbname="assest";

// Create connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    return $conn;
    
}