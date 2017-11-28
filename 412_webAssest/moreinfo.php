<?php include 'functions.php';

session_start(); 



function getUserInfo($assestId) {
    global $conn;
    
    $sql = "SELECT * 
            FROM assests
            WHERE assestId = $assestId"; 
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($record);
    
    return $record;

}

if (isset($_GET['assestId'])) {
     
    $userInfo = getUserInfo($_GET['assestId']); 
     
 }
 
 if (isset($_GET['submitupdate'])){
     
     $assest = $_GET['assestId'];
    $category = $_GET['ca'];
    $manufacturer = $_GET['ma'];
    $model = $_GET['mo'];
    $date= $_GET['da'];
    $price= $_GET['pr'];
    $currentValue = $_GET['cu'];
    $condition = $_GET['co'];
    $expirationDate = $_GET['ex'];
    $Location = $_GET['Lo'];
    $retiredDate= $_GET['re'];
    $description = $_GET['de'];
  
    $sql = "UPDATE assests
             SET category = $category, manufacturer = '$manufacturer', model = '$model' , date = '$date' , purchasePrice = '$price', currentValue = '$currentValue' , conditionn = '$condition' , warrantExpDate = '$expirationDate' , location = '$Location' , retiredDate = '$retiredDate' , description = '$description' WHERE assestId = $assest";
             
    
    
    echo $sql;
   
  
    
    $stmt=$conn->prepare($sql);
    $stmt->execute($np);
    
 }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Assets</title>
        <style>
         @import url("styles.css");  
            /* Style the tab */
            div.tab {
                overflow: hidden;
                border: 1px solid #ccc;
                background-color: #f1f1f1;
            }
            
            /* Style the buttons inside the tab */
            div.tab button {
                background-color: inherit;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                transition: 0.3s;
                font-size: 17px;
            }
            
            /* Change background color of buttons on hover */
            div.tab button:hover {
                background-color: #ddd;
            }
            
            /* Create an active/current tablink class */
            div.tab button.active {
                background-color: #ccc;
            }
            
            /* Style the tab content */
            .tabcontent {
                display: none;
                padding: 6px 12px;
                border: 1px solid #ccc;
                border-top: none;
            }
         
        </style>
    </head>
    <body>
        <h1>Internal Network Assets</h1>
        <h2> More Information </h2>
        <form method= "GET">
             Equipment Assest Number <input type="text" name="assestId" value="<?=$userInfo['assestId']?>"/><br>
                   
            <br>   
      
         Category     
            <select name="ca">
                <option value="" >- Select One - </option>
                <option value="<?=$userInfo['category']?>"></option>
                <option value="1">Category 1</option>
                <option value="2"> Category 2</option>
                   <option value="3"> Category 3</option>
                      <option value="4"> Category 4</option>
                         <option value="5"> Category 5</option>
            </select>
              <br>
              <br>
              Manufacturer: <input type="text" name="ma"  value="<?=$userInfo['manufacturer']?>"><br>
                   
            <br>   
            
            Model <input type="text" name="mo" value="<?=$userInfo['model']?>"><br>
                   
            <br>   
            
            Acquired Date <input type="text" name="da" value="<?=$userInfo['date']?>">
                    
            <br>  
            <br> 
            Purchase Price <input type="text" name="pr" value="<?=$userInfo['purchasePrice']?>">
                   
            <br>   
            <br> 
            Current Value <input type="text" name="cu" value="<?=$userInfo['currentValue']?>">
            <br>   
            <br> 
            Condition   
            <select name="co">
                <option value="" >- Select One - </option>
                <option value="Bad">Bad</option>
                <option value="Good"> Good</option>
                   <option value="Excellent"> Excellent</option>
                      
            </select>
                <br>   
                <br>
                Warranty Expiration Date <input type="text" name="ex" value="<?=$userInfo['warrantExpDate']?>">
            <br>   
            <br> 
            
            Location  
            <select name="Lo">
                <option value="" >- Select One - </option>
                <option value="Library">Library</option>
                <option value="BIT"> BIT</option>
                   <option value="mainOffice"> Main Office</option>
                      
            </select>
            
                <br>   
                <br>
                Retire Date
                <select name="re">
                <option value="" >- Select One - </option>
                <option value="01/2018">01/2018</option>
                <option value="06/2018">06/2018</option>
                   <option value="01/2019">01/2019</option>
                    </select>
                <br>
                <br>
              
                Description 
                <br><input style="width:1600px;height:100px;" type="text" name="de" value="<?=$userInfo['description']?>">
                <br>
                <br>
            <div class="center">
            <input style"margin:auto 0;" type="submit" name= "submitupdate" value="Update">
            </div>
            </form>
          
                
            </body>
        </html>
        