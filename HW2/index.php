<?php
    include 'functionshw2.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Home Workouts </title>
    </head>
    <body>
        <style>
            @import url("styleshw2.css");
        </style>
       <h1>Workouts</h1>
      
        <div id="main">
            <?php
                play();
            ?>
       </<div>
       <form>
           <input type="submit" value="Click here for different workout!"/>
       </form>
        <hr>
        <footer>
            <div class="left"></div>
            <div class="middle">
                Course Name CST336. 2017&copy; Singh 
                <br/>
                
                <strong> Disclaimer:</strong> The information in this webpage is fictitous.
                <br />
            </div>
            <div class="right">
                <img id="logo" src="img/csumb.png" alt="Picture of csumb logo" />
            </div>
        </footer>
    </body>
</html>