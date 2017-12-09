<?php
session_start();
include 'inc/dbConn.php';
$dbConn = getDBConnection();



function getType2()
{
     $types = array("Whey Protein","Pre Workout","Isolate Protein","Fat Burner","BCAA","CLA","MultiVitamin","MSM","Vitamins","All in One");
    return $types;
}


function printResult($records)
{
    echo"<table align = 'center'>";
    echo"<th><tr>";
    
    echo"<td><b>Asset #</b></td>";
    
    echo"<td><b>Brand</b></td>";
    
    echo"<td><b>Model</b></td>";
    
    echo"<td><b>Type</b></td>";
    
    echo"<td><b>Purchase Date</b></td>";
    
    echo"<td><b>Purchase Price</b></td>";
    
    echo"<td><b>Expire Date</b></td>";
    
   
    echo"<td><b>Comments</b></td>";
    
    echo"</tr></th>";
    
    foreach($records as $record)
    {
        echo"<tr>";
    
    echo"<td>";
    echo$record['asset_num'];
    echo"</td>";
    
    echo"<td>";
    echo$record['company_name'];
    echo"</td>";
    
    echo"<td>";
    echo$record['model_num'];
    echo"</td>";
    
    echo"<td>";
    echo$record['type'];
    echo"</td>";
    
    echo"<td>";
    echo$record['purch_date'];
    echo"</td>";
    
    echo"<td>";
    echo$record['purch_price'];
    echo"</td>";
    
    echo"<td>";
    echo$record['expire_date'];
    echo"</td>";
    
    echo"<td>";
    echo$record['comments'];
    echo"</td>";
    
    echo"</tr>";
    }
}


function getRecords()
{
    global $dbConn;
    
    $sql = "SELECT * 
            FROM assets
            NATURAL JOIN description
            NATURAL JOIN support
            WHERE 1";
    
    /*$sql = "SELECT * FROM admin WHERE username = :username AND password = :password";

    $namedParameters[':username'] = $username;
    $namedParameters[':password'] = $password;*/
    
    if(!empty($_GET['brand']))
    {
        //$sql .= " and manufac_name = '".$_GET['brand']."'";
        
        
        $sql .= " AND company_name = :company_name";
        $namedParameters[':company_name'] = $_GET['brand'];
    }
    
    
    if(!empty($_GET['model']))
    {
        //$sql .= " and model_num = '".$_GET['model']."'";
        
        $sql .= " AND model_num = :model_num";
        $namedParameters[':model_num'] = $_GET['model'];
    }
    
    
    if(!empty($_GET['type']))
    {
        $sql .= " and type = '".$_GET['type']."'";
    }
    if(!empty($_GET['purchaseDate']))
    {
        $sql .= " and purch_date = '".$_GET['purchaseDate']."'";
    }
    
   
    
    echo "<br />";
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    
    if(empty($records))
    {
        echo "Can't find any supplement with the entered information.";
    }
    else
    {
        printResult($records);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Search for Item</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <style>
            
            .jumbotron {
                text-align:center;
            }
            table{
                align:center;
                
            }
            td{
                padding: 5px;
            }
            tr:hover {background-color: #f5f5f5}
        
            
        </style>
    </head>
    <body>
        
        <div class="jumbotron">
            <h1>Search for Supplement</h1>
            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <!--<div class="navbar-header">-->
                <!--  <a class="navbar-brand" href="#">Asset Control Center</a>-->
                <!--</div>-->
                <ul class="nav navbar-nav">
                  <li class="active"><a href="userSearch.php" id="currentpage">Search</a></li>
                  <li><a href="login.html">Login Page</a></li>
                  <li><a href="firstPage.php">Exit</a></li>
                </ul>
              </div>
            </nav>
        
        
            <table id="table">
            <form>
                <tr>
                    <td>
                Company Name: </td><td><input type="text" name="brand" value=""/></td>
                </tr>
                <tr><td>
                Model: </td><td><input type="text" name="model" value=""/></td>
                </tr>
                <tr><td>
                Type: </td><td><select name="type" value=""/>
                           <option value="">Select One</option>
                           <?php
                             $Types = getType2();
                              foreach ($Types as $Type) 
                              {
                                  echo "<option>" . $Type. "</option>";
                              }
                           ?>
                           </select></td>
                </tr>
                <tr><td>
                Purchase Date: </td><td><input type="date" name="purchaseDate"/></td>
                </tr>
    
                <tr><td>
                <input type="submit" name="submit" value="Submit" id="submit"/></td>
                </tr>
            </form>
            </table>
        </div> 
        <?php
        
            if(isset($_GET['submit']))
            {
                getRecords();
            }
        
        
        ?>
        
       
    </body>
</html>