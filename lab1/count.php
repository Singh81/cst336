<?php
header('Access-Control-Allow-Origin: *');
include 'inc/dbConn.php';

$dbConn = getDBConnection();

$sql = "SELECT count(asset_num) as count
        FROM assets 
        NATURAL JOIN description
        WHERE 1";
    
if(!empty($_GET['filterType']))
{
    $sql .=" and type = '".$_GET['filterType']."'";
}


$stmt = $dbConn -> prepare ($sql);
$stmt -> execute($np);
$records = $stmt->fetch(PDO::FETCH_ASSOC); 
echo json_encode($records);
?>