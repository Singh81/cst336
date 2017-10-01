

<?php
$backgroundImage = "img/sea.jpg";

//API call goes here
 if(isset($_GET['keyword'])){
           include 'api/pixabayAPI.php';
           $imageURLs = getImageURLs($keyword);
            $backgroundImage = $imageURLs[array_rand($imageURLs)];
            }
       
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Image Crousel </title>
        <meta charset="utf-8">
       
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        @import url("css/styles.css");
        body{
         background-image: url(<?=$backgroundImage?>);
        }
    </style>
    </head>
    <body>
        <br>
       <?php
       if(!isset($imageURLs)){
           echo "<h2> Please type a word to display a slideshow <br/> with random images from Pixabay.com </h2>";
       }
       else {
           
           ?>
            
    
  
    <div id="carousel-example-generic" class ="carousel slide" data-ride="carousel">
                 <!-- Indicators Here -->
                 
    <ol class="carousel-indicators">
        <?php
        for($i =0;$i<7;$i++){
            echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
            echo ($i ==0)? "class='active'": "";
            echo "></li>";
        
        }
        ?>
  </ol>
                
                
             
                 
                 <!-- Wrapper for Images -->
                 
    <div class="carousel-inner" rolde="listbox">
        <?php
        for($i=0;$i<7;$i++){
                do {
                    $randomIndex = rand(0,count($imageURLs));
                }
                while(!isset($imageURLs[$randomIndex]));
                
                echo '<div class="item';
                echo ($i ==0)?"active": "";
                echo '">';
                echo '<img src="'.$imageURLs[$randomIndex].'">';
                echo '</div>';
                unset($imageURLs[$randomIndex]);
            }
       
           //Display Carousel Here
       
    ?>
       
      </div>
      
        <!-- Controls Here -->
       <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
      
      
    </div>
       <!--html form goes here! --> 
           
         
           
     <?php
           
       } 
          
       
       ?>
     
       <br>
    
       <form>
             <input type="text" name ="keyword" placeholder="keyword" value="<?=$_GET['keyword']?>"/>
            <input type="submit" value ="Search" />

       </form>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
    
    
    

</html>