<html>
    <head>
    </head>
    
    
     <body>
        <?php
            
          
          $person = array(
              "name" => "user1",
              "imgUrl" => "/cards/profpics/user1.png",
              "cards" => array(
                  array(
                      "suit" => "hearts",
                      "value" => "4"
                      ),
                  array(
                      "suit" => "clubs",
                      "value" => "10"
                      )
                  )
            );
            
            function displayPerson($person)
            {
            // show profile pic
            echo "<img src='".$person["profpics"].'/user1.png'."/>";
            
            //Iterate through $persons "cards"
            
            for($i = 0; $i< count($person["cards"]);$i++)
                {
                $card = $person["cards"][$i];
                
            // construct the imgUrl for each card
                $imgUrl = "/cards/".$card["suit"]."/".$card["value"].".png";
                
            // translate to HTML
            echo "<img src>'".$imgUrl."/>";
                }
                
                echo calculateHandValue($person["cards"]);
            }
            
            
            function calculateHandValue($cards)
            {
                $sum = 0;
                
                foreach($cards as $cards)
                {
                    $sum += $card["value"];
                    
                }

            }
            displayPerson($person);


            
            
            
            
            echo "name: " .$person["name"]. "<br>";
            echo "imgUrl: " .$person["imgUrl"]. "<br>";
            
            
           ?>
    </body>
</html>