<?php
include 'inc/dbConn.php';
$dbConn = getDBConnection();

global $dbConn;
    
    
    
    
    
    $sql = "SELECT sum(purch_price) as value
            FROM assets 
            NATURAL JOIN description
            WHERE 1";
        
    if(!empty($_GET['filterType']))
    {
        $sql .=" and type = '".$_GET['filterType']."'";
    }
            
    //echo $sql;
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute();
    $records = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($records);
?>