<?php
session_start();
if (!isset($_SESSION["username"])) //Check whether the admin has logged in
{  
    header("Location: login.html"); 
}
    include 'inc/dbConn.php';
    include 'functions.php';
    $dbConn = getDBConnection();
     
     $_SESSION['name']= $_GET['brand'];
     $_SESSION['model']= $_GET['model'];
     //$_SESSION['type']= $_GET['type'];
     $_SESSION['type'] = strtolower($_GET['type']);
     $_SESSION['purchasePrice']= $_GET['purchasePrice'];
     $_SESSION['purchaseDate']= $_GET['purchaseDate'];
     $_SESSION['Expire_Date']= $_GET['Expire_Date'];
     $_SESSION['comments']= $_GET['comments'];
    
    
    
    function insertIntoAssetsTable()
    {
        global $dbConn;   //asset_num is auto increment
                
        $sql = "insert into assets (asset_id,company_id,purch_date,purch_price,expire_date,comments) 
                values ('".$_SESSION['asset_id']."','".
                $_SESSION['company_id']."','".
                $_SESSION['purchaseDate']."',
                :purchasePrice,'".
                $_SESSION['Expire_Date']."',
                :comments)";
        $namedParameters[':purchasePrice'] = $_SESSION['purchasePrice'];
        $namedParameters[':comments'] = $_SESSION['comments'];
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute($namedParameters);
        clearSession("insert");
        //session_destroy();
        //header("Location: insert.php");
    }
    
    
    function getAssetId()
    {
        global $dbConn;
        
        $sql = "SELECT asset_id FROM description GROUP BY timestamp DESC limit 1";
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['asset_id']=$record['asset_id'];

        insertIntoAssetsTable();
    }
    function insertIntoDescription()
    {
        global $dbConn;
        
        //echo $_SESSION['type'];
        
        /*$sql = "insert into description (type,company_name,model_num) 
                values ('".$_SESSION['type']."','".$_SESSION['name']."','".$_SESSION['model']."')";*/
        
        $sql = "insert into description (type,company_name,model_num) 
                values ('".$_SESSION['type']."',:brand,:model)";        
        $namedParameters[':brand'] = $_SESSION['name'];
        $namedParameters[':model'] = $_SESSION['model'];
        
                
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute($namedParameters);
        
        getAssetId();
    }
    
    
    function insertIntoSupportTable()
    {
        global $dbConn; 
        
        //$sql = "select company_id from support where company_name = '".$brand."'";
        
        $sql = "select company_id from support where company_name = :brand";
        $namedParameters[':brand']= $_SESSION['name'];
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute($namedParameters);
        $records = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r($records);
        echo"<br />";
        if(empty($records))
        {
            header("Location: manf.php");
        }
        else
        {
            $_SESSION['company_id'] = $records['company_id'];
            insertIntoDescription();
        }
    }    
    
    function insertAsset()
    {
        if(empty($_SESSION['name']))
        {
           echo "Company name Can't be empty!!!"; 
           echo"<br />";
           return;
        }
        if(empty($_SESSION['model']))
        {
           echo "Model number can't be empty!!!"; 
           echo"<br />";
           return;
        }
        if(empty($_SESSION['type']))
        {
           echo "Must choose product type!!!"; 
           echo"<br />";
           return;
        }
        if(empty($_SESSION['purchasePrice']))
        {
           echo "Purchase price can't be empty!!!"; 
           echo"<br />";
           return;
        }
        if(empty($_SESSION['purchaseDate']))
        {
           echo "Select purchase date!!!"; 
           echo"<br />";
           return;
        }
        if(empty($_SESSION['Expire_Date']))
        {
           echo "Select expiration date!!!"; 
           echo"<br />";
           return;
        }
        insertIntoSupportTable();
        echo"<br />";
        echo "Record Inserted Successfully!!";
    }
    
    
    
function selectType($type)
{
    //echo $type;
    if (strtoupper($_SESSION['type']) == strtoupper($type)) 
    {
        return "selected";
    }
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title> Assets Website </title>
        
        
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
    
        <h1>Insert a new record</h1>
            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <!--<div class="navbar-header">-->
                <!--  <a class="navbar-brand" href="#">Asset Control Center</a>-->
                <!--</div>-->
                <ul class="nav navbar-nav">
                  <li><a href="displayAll.php">Main Page</a></li>
                  <li><a href="search.php">Search</a></li>
                  <li class="active"><a href="insert.php" id="currentpage"> Insert</a></li>
                  <li><a href="update.php">Update</a></li>
                  <li><a href="delete.php">Delete</a></li>
                  <li><a href="generateReports.php">Generate Reports</a></li>
                  
                </ul>
              </div>
            </nav>
        
        </div>
        
        <div class="table-responsive">
          <table>
            <form>
                <div class="form-group">
                    <tr><td>
                    Company Name: </td><td><input type="text" name="brand" value="<?=$_SESSION['company_name']?>"/>
                    </td></tr>
                    <tr><td>
                    Product: </td><td><input type="text" name="model" value="<?=$_SESSION['model']?>"/>
                    </td></tr>
                    <tr><td>
                     Type: </td><td><select name="type">
                               <option value="">Select One</option>
                               <?php
                                 $types = getType3();
                                  foreach ($types as $type) 
                                  {
                                      echo "<option ".selectType($type).">" . $type. "</option>";
                                  }
                               ?>
                               </select>
                    </td></tr>
                    <tr><td>
                    Purchase Price:</td><td><input type="price" name="purchasePrice" value="<?=$_SESSION['purchasePrice']?>"/>
                    </td></tr>
                    <tr><td>
                    Date of Purchase: </td><td><input type="date" name="purchaseDate" value="<?=$_SESSION['purchaseDate']?>"/>
                    </td></tr>
                    <tr><td>
                     Expiration Date: </td><td><input type="date" name="Expire_Date" value="<?=$_SESSION['Expire_Date']?>"/>
                    </td></tr>
                    <tr><td>
                    Comments: </td><td><input type="text" name="comments" value="<?=$_SESSION['comments']?>"/>
                    </td></tr>
                    <tr><td>
                        </div>
                    <input type="submit" name="submit" value="Submit" id="submit"/>
                    </td></tr>
                </div>
            </form>
        </table>
        
        <?php
       
       if(isset($_GET['submit']))
            {
                //echo"from if";
                //print_r($brand);
                insertAsset();
            }
            //getDevices();
            //insertAsset();
            //deleteRecord();
            //updateRecord()
        ?>
    </body>
</html>