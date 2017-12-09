<?php
session_start();
if (!isset($_SESSION["username"])) //Check whether the admin has logged in
{  
    header("Location: login.html"); 
}
include 'inc/dbConn.php';
$dbConn = getDBConnection();

$_SESSION['asset_num']=$_GET['Num'];
$_SESSION['type']=$_GET['type'];

function getType6()
{
     $types = array("Whey Protein","Pre Workout","Isolate Protein","Fat Burner","BCAA","CLA","MultiVitamin","MSM","Vitamins","All in One");
    return $types;
}

function check()
{
    if(!empty($_SESSION['asset_num']))
    {
        //do something
        //echo $_SESSION['asset_num'];
        header("Location: updateByNum.php");
    }
    else
    {
        echo "Enter asset number!!!!";
        //echo $_SESSION['type'];
    }
}
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Update Asset </title>
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
            <h1>Update an Asset </h1>
            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <!--<div class="navbar-header">-->
                <!--  <a class="navbar-brand" href="#">Asset Control Center</a>-->
                <!--</div>-->
                <ul class="nav navbar-nav">
                  <li><a href="displayAll.php">Main Page</a></li>
                  <li><a href="search.php">Search</a></li>
                  <li><a href="insert.php"> Insert</a></li>
                  <li class="active"><a href="update.php" id="currentpage">Update</a></li>
                   <li><a href="delete.php">Delete</a></li>
                   <li><a href="generateReports.php">Generate Reports</a></li>
                </ul>
              </div>
            </nav>
        
        </div>
        <br />
        
        
        <form> 
            Enter Product Number:<input type="text" name="Num"/>
            <br />
            <input type="submit" name="submit" value="Submit" id="submit"/>
        
        
        </form>
        
        
        <?php
            if(isset($_GET['submit']))
            {
                check();
            }
        
        ?>
    </body>
</html>