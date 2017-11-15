<?php
session_start();   //starts or resumes a session

function loginProcess() {

    if (isset($_POST['loginForm'])) {  //checks if form has been submitted
    
        include 'database.php';
        $conn = getDatabaseConnection();
      
            $username = $_POST['username'];
            $password = sha1($_POST['password']);
            
            $sql = "SELECT *
                    FROM Admin
                    WHERE userName = :username 
                    AND   password = :password ";
            
            $namedParameters = array();
            $namedParameters[':username'] = $username;
            $namedParameters[':password'] = $password;

            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            $record = $stmt->fetch();
            
            if (empty($record)) {
                
                echo "Wrong Username or password";
                
            } else {
                
               $_SESSION['username'] = $record['userName'];
               $_SESSION['adminName'] = $record['firstName'] . "  " . $record['lastName'];
               //echo $record['firstName'];
               header("Location: admin.php"); //redirecting to admin.php
                
            }
           // print_r($record);
    }
}

?>

<!DOCTYPE html>:
<html>
    <head>
        <title> Admin Login  </title>
        
        <style>

        @import url("style.css");            
        </style>
    </head>
    <body>
            <h1> Admin Login </h1>
            <div class ="main">
                
                Password: <input type="password" name="password" /> <br />
                
                <input type="submit" name="loginForm" value="Login!"/>
                
            </form>
           
            <br />
            
            <?=loginProcess()?>
             </div>
    </body>
</html>