var workoutName = ["Spartan" ,"Assasin" , "Armor" , "Batman" , "Captain America" ,"Super Saiyan" , "Lier Cake" ,"Predator" ,"Avenger" ,"Wolverine"];
var quotes = ["Rise up, warriors, take your stand at one another's sides, our feet set wide and rooted like oaks in the ground." ,"Nothing is True, Everything is Permitted" , "Finally, be strong in the Lord and in the strength of His might." , "It's not who I am underneath, but what I do that defines me" , "I don’t want to kill anyone. I don’t like bullies; I don’t care where they’re from." ,"Power comes in response to a need, not a desire. You have to create that need" , "I want that cake!" ,"I ain't got time to bleed" ," You have no idea what you are dealing with" ," Sometimes, when you cage the beast, the beast gets angry."];

var randomNumber = Math.floor(Math.random()*10);
var workoutnaam = workoutName[randomNumber];
console.log(workoutnaam);
var num =0;
window.onload= function(){
function play(randomi){
    
    
    for(ii =0;ii<10;ii++){
        if(ii==randomNumber){
        
            document.getElementById("workoutname").innerHTML = workoutnaam;
            document.getElementById("quote").innerHTML = quotes[ii];
             var img = new Image();
                img.src = "img/" + ii + ".jpg";
                console.log(img.src);
                     // when image is loaded, add it to my div
                     img.addEventListener("load", function(){
                         document.getElementById("workout").appendChild(this);
                     });
        }
    }
}

 play(randomNumber);
 
  $('.click').on("click", function(){
          location.reload();
       })
  
}  
  