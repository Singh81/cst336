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
$servername ="us-cdbr-iron-east-05.cleardb.net";
$username ="b253634d031b02";
$password ="a3d6690d";
$dbname ="heroku_14ce4fd1a99cddb";

//create connection
$conn = new mysqli($servername , $username ,$password ,$dbname);

if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
    }
    
    ?>
        <?php
        
function displayDevices(){
    global $conn;
       
   
    $sql = "SELECT * FROM Device WHERE 1";
    $print = $conn->query($sql);
           
        if(!isset($_GET['submit']))
        {
        
        if($print->num_rows > 0) {
              
            while($row = $print->fetch_assoc()){
              
                echo "<div class='center'>";
                echo "Device Name: ".$row["deviceName"]. ", Type:    ". $row["deviceType"] .", Price:   ".$row["price"]."<br>";
                echo "</div>" ;          
                             }
                        }


            }
   
   if (isset($_GET['submit']))
   {
       
       
       if (!empty($_GET['deviceName']))
       {
           $name = $_GET['deviceName'];
           $sql .=" AND deviceName LIKE '%$name%'"; 

        }
        
       if (!empty($_GET['deviceType'])) {
            
            $type = $_GET['deviceType'];
           $sql .= " AND deviceType = '$type'"; 
           
           
       }
        if (isset($_GET['available'])) 
        {
            $sql .= " AND status Like '%availa%'";
        }
        
        if(!isset($_GET['available']))
        {
            
            $sql.= " AND status = 'checked out'";
        }
        
        if (isset($_GET['name'])) 
        {
             $sql .= " ORDER BY deviceName"; 
          
        }
        if (isset($_GET['price'])) 
        {
             $sql .= " ORDER BY price";
        }
        $print = $conn->query($sql);
           
        if(isset($_GET['submit']))
        {
        
        if($print->num_rows > 0) {
              
            while($row = $print->fetch_assoc()){
              
                echo "<div class='center'>";
                echo "Device Name: ".$row["deviceName"]. ", Type:    ". $row["deviceType"] .", Price:   $".$row["price"]."<br>";
                echo "</div>" ;          
                             }
                        }


            }
  
   echo "<br>";
    echo "<br>";
   
        }
    }
       ?>
       <div class="main">
       <h1> Devices Library </h1>
       <br>
       <br>
       <br>
       <form>
           Device: <input type="text" name="deviceName" placeholder="Device Name"/>
           Type: 
           <select name="deviceType">
               <option value="laptop"> laptop</option>
               <option value="computer"> computer</option>
               <option value="tablet"> tablet</option>
               <option value="drink"> drink</option>
               <option value="fitness tracker"> fitness tracker</option>
               <option value="paper weight"> paper weight</option>
           </select>
           
           <input type="checkbox" name="available" value="available">
           <label for="available"> Available </label>
           
           <br>
           Order by:
           <input type="radio" name="name" id="orderByName" value="name" <?= $checkmark ?>/> 
            <label for="oderByName"> Name </label>
           <input type="radio" name="price" id="orderByPrice" value="price" <?= $checkmark1 ?>/> 
            <label for="oderByPrice"> Price </label>
           
           
           
           <input type="submit" value="Submit" name="submit" >
           
       </form>
       </div>
       
       
       <hr>
       
       <?=displayDevices()?>
       
    </body>
</html>
