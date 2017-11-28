<?php
//session_start();   //starts or resumes a session
 include 'database.php';
 $conn = getDBConnection();
 
 
function searchAll(){
 
 global $conn;
 
 $sql = " SELECT * FROM `assests` WHERE retiredDate > '2017-11-27' ";
 
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
  //print_r($records);
  return $records;
} 

function search(){
 
 global $conn;
 
 $assest = $_GET['search'];
 
 $sql = "Select * from assests where assestId = $assest";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
  //print_r($records);
  
   if($records){
    return $records;
   
  }
  else {
   manu();
  }
}
  
 function manu()
 {
  global $conn;
 echo "im sinde is";
 $assest = $_GET['search'];
  
  
  
 $sql = "Select * from assests where manufacturer = $assest";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
   if($records){
    return $records;
   }
   
   else{
    model();
   }
  
 
  
 }
 
function model(){
  global $conn;
 
 $assest = $_GET['search'];

 $sql = "Select * from assests where model = $assest";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
  //print_r($records);
  return $records;
 
 }
 

 





function insert(){
 
  global $conn;
  
   
    $assest = $_GET['assest'];
    $category = $_GET['category'];
    $manufacturer = $_GET['manufacturer'];
    $model = $_GET['model'];
    $date= $_GET['date'];
    $price= $_GET['price'];
    $currentValue = $_GET['currentValue'];
    $condition = $_GET['conditionn'];
    $expirationDate = $_GET['expirationDate'];
    $Location = $_GET['Location'];
    $retiredDate= $_GET['retire'];
    $description = $_GET['description'];
  
  $sql = "INSERT INTO assests
             (category, manufacturer, model, date, purchasePrice, currentValue , conditionn , warrantExpDate , location , retiredDate , description, assestId) 
             VALUES
             ($category, '$manufacturer', '$model', '$date', '$price', '$currentValue' , '$condition' , '$expirationDate' , '$Location' , '$retiredDate' , '$description' , '$assest')";
             
    
    
    echo $sql;
   
  
    
    $stmt=$conn->prepare($sql);
    $stmt->execute($np);
   echo $sql;
 
}

function update(){
 
 
 
 
 
}
 
 
function userList(){
global $conn;
 
  $sql = "SELECT *
          FROM Products NATURAL JOIN Company";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
  //print_r($records);
  return $records;


}

function productList(){

 global $conn;
 
 $sort = $_POST['sort'];
  $sql = "SELECT *
          FROM Products NATURAL JOIN Company order by price $sort";
          
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
   //echo "$sql";
  //print_r($records);
  return $records;


}

function companyList(){
      
        global $conn;
        
        $sql = "SELECT * FROM Company";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $records;
    }

function searchByCompany(){

 global $conn;
 
 $company = $_POST['company'];
  $sql = "SELECT *
          FROM Products NATURAL JOIN Company where company_id = $company";
          
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
   //echo "$sql";
  //print_r($records);
  return $records;


}

function searchByCategory(){

 global $conn;
 
 $category = $_POST['category'];
  $sql = "SELECT *
          FROM Products NATURAL JOIN Company NATURAL JOIN Department where department_id = $category";
          
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
   //echo "$sql";
  //print_r($records);
  return $records;


}



function combinationPriceCompany(){

 global $conn;
 
 $company = $_POST['company'];
 $sort = $_POST['sort'];
  $sql = "SELECT *
          FROM Products NATURAL JOIN Company where company_id = $company order by price $sort";
          
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
   //echo "$sql";
  //print_r($records);
  return $records;


}



function getCompanyList(){
  global $conn;
 
  $sql = "SELECT * FROM Company;";  // change
  
  $stmt = $conn->prepare($sql);
  $stmt->execute();
   //echo "$sql";
  //print_r($records);
  //return $records;
  
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
  foreach($rows as $row){
    echo "<option value='". $row['company_id']. "'>". $row['company_name']. "</option>";
  }
}

function getCategoryList(){
  global $conn;
 
  $sql = "SELECT * FROM Department;";  // change
  
  $stmt = $conn->prepare($sql);
  $stmt->execute();
   //echo "$sql";
  //print_r($records);
  //return $records;
  
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
  foreach($rows as $row){
    echo "<option value='". $row['department_id']. "'>". $row['department_name']. "</option>";
  }
}

?>