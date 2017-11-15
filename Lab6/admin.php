<?php
session_start();

if (!isset($_SESSION['username'])) {  //checks whether the admin is logged in
    header("Location: index.php");
}

function userList(){
  include 'database.php';
  $conn = getDatabaseConnection();
  
  $sql = "SELECT *
          FROM User Order By firstName";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
  //print_r($records);
  return $records;
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Main Page </title>
        <style>
        @import url("style.css");    
            
        </style>
        <script>
            
            function confirmDelete() {
                
                return confirm("Are you sure you want to delete this user?");
                
            }
            
        </script>
    </head>
    <body>

            <h1> Admin Main </h1>
            <div class="main">
            <h2> Welcome <?=$_SESSION['adminName']?>!</h2>
            
            <form action="addUser.php">
                
                <input type="submit" value="Add new user" />
                
            </form>
            
            
            <form action="logout.php">
                
                <input type="submit" value="Logout!" />
                
            </form>
            
            
            
            <br />
            
            <?php
            
             $users = userList();
             
             foreach($users as $user) {
                 
                 
                 echo $user['id'] . "  " . $user['firstName'] . " " . $user['lastName'];
                 
                 echo "[<a href='updateUser.php?userId=".$user['id']."'> Update </a>] ";
                 echo "[<a onclick='return confirmDelete()' href='deleteUser.php?userId=".$user['id']."'> Delete </a>] <br />";
                 
                 
                 
                 
             }
             
             
             
             ?>
         </div>
    </body>
</html>