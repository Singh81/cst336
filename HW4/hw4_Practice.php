<?php
include 'action_page.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Home Workouts </title>
    </head>
    <body>
        <style>
            @import url("styles.css");
        </style>
        <div class="center">
       <h1 id="h1">Workouts</h1>
       </div>
       <div class="center">
            <form method ="GET" action ="">
            <select name="Gender">
              <option value="male"> Male </option>    
              <option value="female"> Female </option>
              </select>
        <div id="info">
        Please enter your name below :
        </div>
        
        <input type="text" name="nameofperson" value=""/>
       <div class="option">
             <table class="center">
         <input  type="radio" name ="workoutname" value="legs"> Legs
         <input  type="radio" name ="workoutname" value="back"> Back
          <input  type="radio" name ="workoutname" value="arms"> Arms
           <input  type="radio" name ="workoutname" value="chest"> Chest
            <input  type="radio" name ="workoutname" value="shoulder"> Shoulder
             <input  type="radio" name ="workoutname" value="abs"> Abs
             </div>
    
                <table class="center">
                <tr><td>Select your level:</td></tr>
                
                <tr><td>Easy</td>
                <td><input type="checkbox" name="checkbox[]" value ="Easy"/></td>
                </tr>
                <tr><td>Normal</td>
                <td><input type="checkbox" name="checkbox[]" value ="Normal"/></td>
                </tr>
                <tr><td>Brutal</td>
                <td><input type="checkbox" name="checkbox[]" value= "Brutal"/></td>
                </tr>
                </<table>
                
                <div class="option">
                <input type="submit" name = "valid" value="Submit"/>
                </div> 
       </form>  
    
    </div>
    <?php

    if(check()){
        runn();
    }
    
    
    
    ?>
        
 
    </body>
</html>