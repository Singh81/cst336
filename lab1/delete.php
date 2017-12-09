<?php
session_start();
if (!isset($_SESSION["username"])) //Check whether the admin has logged in
{  
    header("Location: login.html"); 
}
include 'inc/dbConn.php';
$dbConn = getDBConnection();

$_SESSION['asset_num']=$_GET['Num'];


function getType6()
{
    
   
   $types = array("Whey Protein","Pre Workout","Isolate Protein","Fat Burner","BCAA","CLA","MultiVitamin","MSM","Vitamins","All in One");
    return $types;
}

function delete()
{
    global $dbConn;
    $_SESSION['asset_num']=$_GET['Num'];
    if(!empty($_SESSION['asset_num']))
    {
        $sql = "SELECT asset_id 
                FROM assets 
                WHERE asset_num = :asset_num";
        
        
        $namedParameters[':asset_num'] = $_SESSION['asset_num'];
        
        
        //echo $_SESSION['asset_num'];
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute($namedParameters);
        $asset_id = $stmt->fetch(PDO::FETCH_ASSOC);
        
        
        //do something
        $sql = "DELETE FROM assets
        WHERE asset_num = :asset_num";
        
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute($namedParameters);
        
        $sql = "DELETE FROM description
        WHERE asset_id = :asset_id";
        
        $np[':asset_id'] = $asset_id['asset_id'];
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute($np);
        
        
    }
    else
    {
        echo "Enter asset number!!!!";
        //echo $_SESSION['device_type'];
    }
}
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Delete Asset </title>
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
            
            </style>
    </head>
    <body>
        <div style="float:right">
        <form action="logout.php" >
            <input type="submit" class="btn btn-danger" value="Logout" />
        </form>
        </div>
        <div class="jumbotron">
            <h1>Delete an Asset </h1>
            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <!--<div class="navbar-header">-->
                <!--  <a class="navbar-brand" href="#">Asset Control Center</a>-->
                <!--</div>-->
                <ul class="nav navbar-nav">
                  <li><a href="displayAll.php">Main Page</a></li>
                  <li><a href="search.php">Search</a></li>
                  <li><a href="insert.php">Insert</a></li>
                  <li><a href="update.php" >Update</a></li>
                  <li class="active"><a href="delete.php" id="currentpage">Delete</a></li>
                  <li><a href="generateReports.php">Generate Reports</a></li>
                </ul>
              </div>
            </nav>
        
        </div>
        <br />
        
        
        <form> 
            Enter product Number:<input type="text" name="Num"/>
            <br />
            <input type="submit" name="submit" value="Submit" id="submit"/>
        
        
        </form>
        
        
        <?php
            if(isset($_GET['submit']))
            {
                delete();
            }
        
        ?>
    </body>
</html>