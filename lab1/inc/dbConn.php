<?php
function getDBConnection()
{
    $host = "localhost";
     $username = "root";
     $password = "cst336";
    $dbname1="Fitness";

// Create connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname1", $username, $password);
    return $conn;
}

?>