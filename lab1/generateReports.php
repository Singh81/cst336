<?php
session_start();
if (!isset($_SESSION["username"])) //Check whether the admin has logged in
{  
    header("Location: login.html"); 
}



function getType4()
{
    $types = array("Whey Protein","Pre Workout","Isolate Protein","Fat Burner","BCAA","CLA","MultiVitamin","MSM","Vitamins","All in One");
    return $types;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Generate Report(s)</title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            
            function getStuff(){
                $("#countPrint").html("");
                $("#value").html("");
                $("#avgValue").html("");
                //alert("hello");
                //alert($("#filterType").val());
                //$('#checkbox').is(":checked")
                if($("#count").is(":checked")){
                    $.ajax({
                        type: "get",
                        url:"count.php",
                        dataType: "json",
                        data: { "filterType": $("#filterType").val()
                                    
                            
                        },
                        success: function(data,status) {
                            $("#countPrint").html("The total <b>count</b> is "+data['count']);
                        
                            //console.log(data['count']);
                          },
                          error: function(data)
                          {
                            console.log(data);  
                          },
                          complete: function(data,status) { //optional, used for debugging purposes
                              //alert(status);
                          }
                   });//AJAX for count
                }
                
                if($("#price").is(":checked"))
                {
                    $.ajax({
                        type: "get",
                        url:"value.php",
                        dataType: "json",
                        data: { "filterType": $("#filterType").val()
                                    
                            
                        },
                        success: function(data,status) {
                            $("#value").html("The total <b>value</b> is $"+data['value']);
                        
                            //console.log(data['count']);
                          },
                          error: function(data)
                          {
                            console.log(data);  
                          },
                          complete: function(data,status) { //optional, used for debugging purposes
                              //alert(status);
                          }
                   });//AJAX for count
                }
                
                if($("#avg").is(":checked"))
                {
                    $.ajax({
                        type: "get",
                        url:"avg.php",
                        dataType: "json",
                        data: { "filterType": $("#filterType").val()
                                    
                            
                        },
                        success: function(data,status) {
                            $("#avgValue").html("The <b>average value</b> is $"+data['value']);
                        
                            //console.log(data['count']);
                          },
                          error: function(data)
                          {
                            console.log(data);  
                          },
                          complete: function(data,status) { //optional, used for debugging purposes
                              //alert(status);
                          }
                   });//AJAX for count
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
            
            
        </style>
        
        
    </head>
    <body>
        <div style="float:right">
        <form action="logout.php" >
            <input type="submit" class="btn btn-danger" value="Logout" />
        </form>
        </div>
        <div class="jumbotron">
            <h1>Generate Report(s)</h1>
            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <!--<div class="navbar-header">-->
                <!--  <a class="navbar-brand" href="#">Asset Control Center</a>-->
                <!--</div>-->
                <ul class="nav navbar-nav">
                  <li><a href="displayAll.php">Main Page</a></li>
                  <li><a href="search.php">Search</a></li>
                  <li><a href="insert.php"> Insert</a></li>
                  <li><a href="update.php">Update</a></li>
                   <li><a href="delete.php">Delete</a></li>
                   <li class="active"><a href="generateReports.php">Generate Reports</a></li>
                </ul>
              </div>
            </nav>
        
        </div>
        <table>
        <form>
            <tr>
                <td>
                    Total Value of Assets: </td><td><input type="checkbox" name="price" id="price" value=""/>
                </td>
            </tr>
            <tr>
                <td>
                    Average Value of Assets: </td><td><input type="checkbox" name="avg" id="avg" value=""/>
                </td>
            </tr>
            <tr>
                <td>
                Count # of products in Inventory: </td><td><input type="checkbox" id ="count" name="count" value="count"/>
                </td>
            </tr>
            <tr>
                <td>
                    Filter by Type: </td><td><select name="filterType" id= "filterType" value=""/>
                               <option value="">Select One</option>
                               <?php
                                 $Types = getType4();
                                  foreach ($Types as $Type) 
                                  {
                                      echo "<option>" . $Type. "</option>";
                                  }
                               ?>
                               </select></td>
                                        </tr>
        </form>
        </table>
        <input type="submit" name="submit" value="Generate" id="submit" onClick="getStuff()"/></td>
        <br /><br />
        <div style="width:800px; margin:0 auto;">
            <span id="value"></span>
            <br />
            <span id="avgValue"></span>
            <br />
            <span id="countPrint"></span>
        </div>
        
        
    </body>
</html>