<?php include 'functions.php';
session_start(); 
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
        <form method="GET">
        Item <input  style="width:1600px;" type="text" name="search">
         <input style"margin:auto 0;" type="submit" name= "submit" value="Search">
        <br>
        <br>
         <input style"margin:auto 0;" type="submit" name= "submission" value="Click here for regular assest list">
        
        <br>
        <div class="tab">
          <button class="tablinks" onclick="">Asset Details</button>
          <button class="tablinks" onclick="">Comments</button>
          </div>
        <br>
         <br>
              Equipment Assest Number <input type="text" name="assest"><br>
                   
            <br>   
      
         Category     
            <select name="category">
                <option value="" >- Select One - </option>
                <option value="1">Category 1</option>
                <option value="2"> Category 2</option>
                   <option value="3"> Category 3</option>
                      <option value="4"> Category 4</option>
                         <option value="5"> Category 5</option>
            </select>
              <br>
              <br>
              Manufacturer: <input type="text" name="manufacturer"><br>
                   
            <br>   
            
            Model <input type="text" name="model"><br>
                   
            <br>   
            
            Acquired Date <input type="text" name="date">
                    
            <br>  
            <br> 
            Purchase Price <input type="text" name="price">
                   
            <br>   
            <br> 
            Current Value <input type="text" name="currentValue">
            <br>   
            <br> 
            Condition   
            <select name="conditionn">
                <option value="" >- Select One - </option>
                <option value="Bad">Bad</option>
                <option value="Good"> Good</option>
                   <option value="Excellent"> Excellent</option>
                      
            </select>
                <br>   
                <br>
                Warranty Expiration Date <input type="text" name="expirationDate">
            <br>   
            <br> 
            
            Location  
            <select name="Location">
                <option value="" >- Select One - </option>
                <option value="Library">Library</option>
                <option value="BIT"> BIT</option>
                   <option value="mainOffice"> Main Office</option>
                      
            </select>
            
                <br>   
                <br>
                Retire Date
                <select name="retire">
                <option value="" >- Select One - </option>
                <option value="01/10/2015">01/10/2015</option>
                <option value="01/10/2016">01/10/2016</option>
                <option value="01/10/2017">01/10/2017</option>
                <option value="01/10/2018">01/10/2018</option>
                <option value="06/10/2018">06/10/2018</option>
                   <option value="01/02/2019">01/02/2019</option>
                    </select>
                <br>
                <br>
              
                Description 
                <br><input style="width:1600px;height:100px;" type="text" name="description">
                <br>
                <br>
            <div class="center">
            <input style"margin:auto 0;" type="submit" name= "submission1" value="Add">
            </div>
            </form>
            <?php
           
            if(isset($_GET['submission']))
            {
            
            echo "<h2>Regular Assets</h2>";
            $users = searchAll();
           
             echo "<table style='margin:5px auto;' border='2'>";
             echo "<tr>";
             echo "<th>Manufacturer</th>";
             echo "<th>Model</th>";
             echo "<th>Current Value</th>";
             echo "<th>Condition</th>";
             echo "<th>Location</th>";
             echo "<th>Retired Date</th>";
             echo "</tr>";
         foreach($users as $user) {
             echo "<tr>";
             echo "<td>".$user['manufacturer']."</td>"."<td>".$user['model'] . "</td>"."   <td>  $" . $user['currentValue'] ."</td>"."<td>".$user['conditionn']."</td>"."<td>".$user['location']."</td>"."<td>".$user['retiredDate']."</td>";
               //echo "<td>"."[<a href='moreinfo.php?product_id=".$user['product_id']."'> Info </a>] "."</td>";
               //echo "<td>"."[<a href='shoppingCart.php?product_id=".$user['product_id']."'> Add To Cart </a>] "."</td>";
              
               echo "</tr>";
                }
            echo "</table>";
                
            }
            if(isset($_GET['submission1'])){
                
            insert();
            
            }
            
            if(isset($_GET['submit'])){
                
                
               $users = search();
               
            echo "<table style='margin:5px auto;' border='2'>";
             echo "<tr>";
             echo "<th>Manufacturer</th>";
             echo "<th>Model</th>";
             echo "<th>Current Value</th>";
             echo "<th>Condition</th>";
             echo "<th>Location</th>";
             echo "<th>Retired Date</th>";
             echo "</tr>";
             foreach($users as $user) {
             echo "<tr>" ;
             echo "<td>".$user['manufacturer']."</td>"."<td>".$user['model'] . "</td>"."   <td>  $" . $user['currentValue'] ."</td>"."<td>".$user['conditionn']."</td>"."<td>".$user['location']."</td>"."<td>".$user['retiredDate']."</td>";
               echo "<td>"."[<a href='moreinfo.php?assestId=".$user['assestId']."'> Modify </a>] "."</td>";
               
              
               echo "</tr>";
               }
            echo "</table>";
               
               
                    }
            
            ?>
        
    </body>
</html>   