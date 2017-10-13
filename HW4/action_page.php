<?php
echo '<link href="styles.css" rel="stylesheet">';
?>
<?php
$Name = $_GET['nameofperson'];
$level = $_GET['checkbox'];
$workoutname = $_GET['workoutname'];
$gender = $_GET['Gender'];
$submit= isset($_GET['valid']);


function check()
{

echo '<div id="display_text">';
 global $gender, $submit, $Name;
 
if($submit){
    
    //echo "inside of valid";
   
       if(!isset($Name) || empty($Name)){
           
           echo "<br>";
           echo "<div class='display_text'>Please fill your name before you get your workout</div>";
           return false;
       }
       
       if(empty($_GET["checkbox"])){
            echo "<br>";
           echo "<div class='display_text'> Level was not selected </div>";
           return false;
       }
       
       if(empty($_GET["workoutname"])){
            echo "<br>";
           echo " <div class='display_text'>Please select a body part for a workout </div>";
           return false;
       }
       
       if(empty($gender) || !isset($gender)){
            echo "<br>";
           echo "<div class='display_text'>Please select your gender</div>";
           return false;
       }
    }
    return true;
   echo '</div>';
}

function runn(){
    global $Name;
echo '<div class="result">';
switch ($_GET["workoutname"]){
    case"legs":{
         $randomValue = rand(1,5);
            for($i=1;$i<6;$i++){
                if($i==$randomValue){
                    echo "This is the workout for you" .$Name;
                    echo "<img id='reel3' src='img/Legs/$randomValue.jpg' alt ='1' title='1' width=30% />";
                }
            }
        break;
    
    }
    case"arms": {
        $randomValue = rand(1,5);
            for($i=1;$i<6;$i++){
                if($i==$randomValue){
                      echo "This is the workout for you " .$Name;
                     echo "<img id='reel3' src='img/Arms/$randomValue.jpg' alt ='1' title='1' width=50% />";
                }
            }
        break;
    }
     case"back": {
       $randomValue = rand(1,5);
            for($i=1;$i<6;$i++){
                if($i==$randomValue){
                      echo "This is the workout for you " .$Name;
                     echo "<img id='reel3' src='img/Back/$randomValue.jpg' alt ='1' title='1' width=50% />";
                }
            }
        break;
    }
     case"chest": {
        $randomValue = rand(1,5);
            for($i=1;$i<6;$i++){
                if($i==$randomValue){
                      echo "This is the workout for you " .$Name;
                     echo "<img id='reel3' src='img/Chest/$randomValue.jpg' alt ='1' title='1' width=50% />";
                }
            }
        break;
    }
     case"shoulder": {
       $randomValue = rand(1,5);
            for($i=1;$i<6;$i++){
                if($i==$randomValue){
                      echo "This is the workout for you " .$Name;
                     echo "<img id='reel3' src='img/Shoulders/$randomValue.jpg' alt ='1' title='1' width=50% />";
                }
            }
        break;
    }
     case"abs": {
       $randomValue = rand(1,5);
            for($i=1;$i<6;$i++){
                if($i==$randomValue){
                      echo "This is the workout for you " .$Name;
                     echo "<img id='reel3' src='img/Abs/$randomValue.jpg' alt ='1' title='1' width=30% />";
                }
            }
        break;
    }
 echo '</div>';      
}
}

 


?>
