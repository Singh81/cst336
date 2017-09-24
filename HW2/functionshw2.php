<?php

        
$workoutName = array("Assasin" , "Armor" , "Batman" , "Captain America" ,"Super Saiyan" , "Lier Cake" ,"Predator" ,"Avenger" ,"Wolverine" ,"Spartan");
$workoutQuotes = array("Nothing is True, Everything is Permitted" , "Finally, be strong in the Lord and in the strength of His might." , "It's not who I am underneath, but what I do that defines me" , "I don’t want to kill anyone. I don’t like bullies; I don’t care where they’re from." ,"Power comes in response to a need, not a desire. You have to create that need" , "I want that cake!" ,"I ain't got time to bleed" ," You have no idea what you are dealing with" ," Sometimes, when you cage the beast, the beast gets angry." ,"Rise up, warriors, take your stand at one another's sides, our feet set wide and rooted like oaks in the ground.");
function displayWorkouts($randomValue) {
            global $workoutName;
    
           // echo "This is a " .$workoutName[$randomValue];
            switch($randomValue) {
                case 0: $symbol = "1";
                break;
                case 1: $symbol = "2";
                break;
                case 2: $symbol = "3";
                break;
                case 3: $symbol = "4";
                break;
                case 4: $symbol ="5";
                break;
                case 5: $symbol ="6";
                break;
                case 6: $symbol ="7";
                break;
                case 7: $symbol ="8";
                break;
                case 8: $symbol ="9";
                break;
                case 9: $symbol ="10";
                break;
            }
            //echo "This is a " .$workoutname[$symbol];
            echo "<img id='reel3' src='img/$symbol.jpg' alt ='$symbol' title='$symbol' width='300' />";
           
        }
        
        function displayHeroes($randomValue){
            switch($randomValue){
                case 0: $symbol = "1.1";
                break;
                case 1: $symbol = "2.1";
                break;
                case 2: $symbol = "3.1";
                break;
                case 3: $symbol = "4.1";
                break;
                case 4: $symbol = "5.1";
                break;
                case 5: $symbol = "6.1";
                break;
                case 6: $symbol = "7.1";
                break;
                case 7: $symbol = "8.1";
                break;
                case 8: $symbol = "9.2";
                break;
                case 9: $symbol = "10.1";
                break;
            }
            echo "<img id='reel2' src='img1/$symbol.png' alt ='$symbol' title='$symbol' width='100' />";
        
        }
        
        
        function play() {
            global $workoutName;
            $randomValue = rand(0,9);
            for($i=0;$i<10;$i++){
                if($i==$randomValue){
               
                   echo "This is a ". $workoutName[$i];
                    echo "</br>";
                }
            }
            global $workoutQuotes;
            for($j=0;$j<10;$j++){
               if($j==$randomValue){
               
                   echo $workoutQuotes[$j];
                    echo "</br>";
                
                }
            }
            
            displayHeroes($randomValue);
            displayWorkouts($randomValue);
            
        }
?>