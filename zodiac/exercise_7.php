<!DOCTYPE html>
<html>
    <head>
        <title> Chinese Zodiav</title>
    </head>
    <body>
    <ul>
        
        
        <?php
        function printt($i)
        {
             echo "<li>";
            if($i==1776)
            {
                echo "Independence ";
            }
            if($i==2008 || $i==1996 || $i==)
            else if($i % 100 ==0){
                echo "New Century Begins:";
                echo $i;
            }
            else
            {
            echo $i;
            }
            echo "</li>";
        }
        ?>
        
        <?php
        function prnt($i)
        {
            echo "<br>";
            echo "Total is " .$i;
           
        }
        ?>
        <?php
        for ($i=1500;$i<2018;$i++)
        {
              printt($i);
              $counter+=$i;
              if($i==2017)
              prnt($counter);
        }
        
        
        ?>
        </ul>   
    </body>
</html>