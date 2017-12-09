<?php

session_start();
if (!isset($_SESSION["username"])) //Check whether the admin has logged in
{  
    header("Location: login.html"); 
}
include 'inc/dbConn.php';
include 'functions.php';
$dbConn = getDBConnection();

//$_SESSION['asset_num']=$_GET['Num'];

$sql = "SELECT * 
        FROM assets
        NATURAL JOIN description
        NATURAL JOIN support
        WHERE asset_num = :asset_num";
        
$np[':asset_num'] = $_SESSION['asset_num'];
        
$stmt = $dbConn -> prepare ($sql);
$stmt -> execute($np);
$records = $stmt->fetch(PDO::FETCH_ASSOC);


$_SESSION['asset_id']=$records['asset_id'];
$_SESSION['company_name']=$records['company_name'];
$_SESSION['model']=$records['model_num'];
$_SESSION['type']=$records['type'];
$_SESSION['purch_price']=$records['purch_price'];
$_SESSION['purch_date']=$records['purch_date'];
$_SESSION['expire_date']=$records['expire_date'];
$_SESSION['comments']=$records['comments'];



//echo $_SESSION['company_name'];



function confirmBeforeUpdate()
{
    echo "<iframe src=\"https://www.w3schools.com\" width=\"400\" height=\"400\" name=\"enterPassword\"></iframe>";
}

function updateRecord()
{
    //confirmBeforeUpdate();
    global $dbConn;
    $sql = "UPDATE assets 
            SET ";
    //echo $_GET['Comments'];
    
    if(!empty($_GET['comments']))
    {
        $sql .= "comments = :comments";
        $np[':comments'] = $_GET['comments'];
    }
    else
    {
        $sql .= "comments = NULL ";
    }
  
    $sql .= ",purch_date = '".$_GET['purchaseDate']."', 
            purch_price = :purch_price,
            expire_Date = '".$_GET['expire_Date']."'
            WHERE asset_num = '".$_SESSION['asset_num']."'";       
            
    $np[':purch_price'] = $_GET['purchasePrice'];
    
  
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute($np);
    
    
    $sql = "UPDATE description 
            SET model_num = :model_num, 
            type = '".$_GET['type']."' 
            WHERE asset_id = '".$_SESSION['asset_id']."'";
    $namedParameters[':model_num'] = $_GET['model'];
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute($namedParameters);
    
    
    clearSession("update");
    header("Location: displayAll.php");
}

function selectType($type)
{
    //echo $type;
    if (strtoupper($_SESSION['type']) == strtoupper($type)) 
    {
        //echo $type;
        return "selected";
    }
}



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update by Asset by Num </title>
        <script>

            function confirmUpdate() 
            {
                var confirmUpdate = confirm("Do you really want to update?");
                if (!confirmUpdate){
                    return false;
                }
            }            
            
        </script>
        
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
            h1{
                align:center;
            }
            
            </style>
    </head>
    <body>
        <div style="float:right">
        <form action="logout.php" >
            <input type="submit" class="btn btn-danger" value="Logout" />
        </form>
        </div>
        <h1>Update Asset Info.</h1>
        <table align="center">
            <form align="center">
                Company Name: <input type="text" name="brand" value="<?=$_SESSION['company_name']?>"/>
                <br />
                Model: <input type="text" name="model" value="<?=$_SESSION['model']?>"/>
                <br />
                 Type: <select name="type">
                           <option value="<?=$_SESSION['type']?> "</option>
                           <!--<?php-->
                           <!--  $types = getType3();-->
                           <!--   foreach ($types as $type) -->
                           <!--   {-->
                           <!--       echo "<option ".selectType($type)." >" . $type. "</option>";-->
                           <!--   }-->
                           <!--?>-->
                           </select>
                <br />
                Purchase Price:<input type="price" name="purchasePrice" value="<?=$_SESSION['purch_price']?>"/>
                <br />
                Date of Purchase: <input type="date" name="purchaseDate" value="<?=$_SESSION['purch_date']?>"/>
                <br />
                Warranty Expiration Date: <input type="date" name="expire_date" value="<?=$_SESSION['expire_date']?>"/>
                <br />
                Comments: <input type="text" name="comments" value="<?=$_SESSION['comments']?>"/>
                <br />
                
                <input type="submit" name="update" value="Update" id="update"/>
                </form>
            </table>
            
            <?php
                if(isset($_GET['update']))
                {
                    updateRecord();
                }
            
            
            ?>
    </body>
</html>