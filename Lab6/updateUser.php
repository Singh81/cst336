<?php
session_start();

    if (!isset($_SESSION['username'])) {
        
        header("Location: index.php");
        
    }


  include 'database.php';
  $conn = getDatabaseConnection();
  
function getUserInfo() {
    global $conn;
    
    $sql = "SELECT * 
            FROM User
            WHERE id = " . $_GET['userId']; 
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($record);
    
    return $record;

}



function departmentList(){
      
        global $conn;
        
        $sql = "SELECT * FROM Departments ORDER BY name";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $records;
    }


 if (isset($_GET['updateUser'])) { //checks whether admin has submitted form.
     
     //echo "Form has been submitted!";
     
     $sql = "UPDATE User
             SET firstName = :fName,
                 lastName  = :lName,
                 role = :rolee
             WHERE id = :id";
     $np = array();
     
     $np[':fName'] = $_GET['firstName'];
     $np[':lName'] = $_GET['lastName'];
     $np[':rolee']=$_GET['role'];
     $np[':id'] = $_GET['userId'];
     
     $stmt = $conn->prepare($sql);
     $stmt->execute($np);
     
     //echo "Record has been updated!";
     
 }


 if (isset($_GET['userId'])) {
     
    $userInfo = getUserInfo(); 
     
 }
 

?>



<!DOCTYPE html>
<html>
    <head>
        <title> Update User </title>
         <style>
         @import url("style.css");    
            
        </style>
    </head>
    <body>

        <h1> Tech Checkout System: Updating User's Info </h1>
        <div class="main">
        <form method="GET">
            <input type="hidden" name="userId" value="<?=$userInfo['id']?>" />
            First Name:<input type="text" name="firstName" value="<?=$userInfo['firstName']?>" />
            <br />
            Last Name:<input type="text" name="lastName" value="<?=$userInfo['lastName']?>"/>
            <br/>
            Email: <input type= "email" name ="email" value="<?=$userInfo['email']?>"/>
            <br/>
            Phone Number: <input type ="text" name= "phone" value="<?=$userInfo['phone']?>"/>
            <br />
           Role: 
           <select name="role">
                <option value=""> - Select One - </option>
                <option value="staff"  <?=($userInfo['role']=='Staff')?" selected":"" ?>  >Staff</option>
                <option value="student" <?=($userInfo['role']=='Student')?" selected":"" ?>  >Student</option>
                <option value="faculty" <?=($userInfo['role']=='Faculty')?" selected":"" ?>>Faculty</option>
            </select>
            <br />
            Department: 
            <select name="deptId">
                <option value="" >- Select One - </option>
                  <?php
                    
                    $departments = departmentList();
                    
                    foreach($departments as $department) {
                       echo "<option value='".$department['id']."' ";
                       echo ($userInfo['deptId']==$department['id'])?" selected":"";
                       echo "> " . $department['name']  . "</option>";  
                    }
                    
                    
                    ?>
                    </select>
                <input type="submit" value="Update User" name="updateUser">
            </form>
        </div>
    </body>
</html>