<!DOCTYPE html>
<html>
    <head>
        <title>SQL</title>
        <style>
            @import url("./style.css");
        </style>
    </head>
    <body>

<?php

   include 'database.php'; 
   
   function displayDeviceList() {
       
       $sql = "SELECT * from device WHERE 1"; 
       $named_parameters = array(); 
       
       if (isset($_GET['submit'])) {
           if (!empty($_GET['device-name'])) {
               // construct our SQL query accordingly.
               $sql .=  " AND deviceName LIKE :deviceName"; 
               $named_parameters[":deviceName"] = "%" . $_GET['device-name'] . "%"; 
           }
           
           if (!empty($_GET['device-type'])) {
               // construct our SQL query accordingly.
               $sql .=   " AND deviceType = '". $_GET['device-type'] . "'"; 
           }
           
           if (isset($_GET['available'])) {
               // construct our SQL query accordingly.
               $sql .=   " AND status = 'available'"; 
           }
           
           if (isset($_GET['order-by'])) {
               // construct our SQL query accordingly.
               $sql .=   " ORDER BY ". $_GET['order-by']; 
           }
           
           
       }
       $dbConn = getDatabaseConnection(); 
   
       
       $statement = $dbConn->prepare($sql);
       $statement->execute($named_parameters);
        
       $records = $statement->fetchAll(); 
        
       foreach ($records as $record) {
           echo "<div class='center'>";
            echo $record["deviceName"]." ".$record["deviceType"]." $".$record["price"]." is ".$record["status"]."<br><br>"; 
            echo "</div>";
       }
   }
   
   function getDeviceTypes() {
        $dbConn = getDatabaseConnection(); 
        $sql = 'SELECT DISTINCT(deviceType)  FROM device;'; 
        $statement = $dbConn->prepare($sql);
        $statement->execute();
        
        $records = $statement->fetchAll(); 
        
        foreach ($records as $record) {
            echo "<option value='". $record['deviceType']. "'>". $record['deviceType']. "</option>"; 
        }
   }
  
  ?>
  
  
  <html>
      <head>
          
      </head>
      <body>
          <hr>
          <h1>Electronics Library</h1>
          <div class="main">
          <form>
               Device Name: <input type="text" name="device-name">
               
               
               Device Type: 
               <select name="device-type">
                     <option value=""></option>
                     <?=getDeviceTypes()?>
               </select>
               
               <input type="checkbox" name="available"> Available 
               
               <br>
               Order by :
               <input type="radio" name="order-by" value="price"> Price 
               <input type="radio" name="order-by" value="deviceName"> Name
               <br>
               <input type="submit" value="Search" name="submit">
          </form>
          </div>
          
          <?=displayDeviceList()?>
      </body>
  </html>