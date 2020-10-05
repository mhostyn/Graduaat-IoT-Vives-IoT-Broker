<?php
require_once('functions.php');

class Card{
    function __construct(){
        //Constructor function = function that automatically gets run when 'summond'
        // var_dump('hoi');
    }

    function getFromDb(){
  
    }

    function sendToDb(){

    }

    function createSelf(){
        //Create X amount of cards
        for ($x = 0; $x <= 3; $x++) {

        echo ' 
       <div class="card" id="card">
       <div class="card__side card__side--front">
           <div class="card__picture card__picture--1">
               &nbsp;
               <!-- <- Empy  space -->
           </div>
           <h4 class="card__heading">
               <span class="card__heading-span card__heading-span-1">
                   Project name
               </span>
           </h4>
           <div class="card__details">
               <ul>
                   <li>Sensor id:</li>
                   <li>Last seen:</li>
               </ul>
           </div>
       </div>
       <div class="card__side card__side--back card__side--back-1">
           <div class="card__cta">
               <div class="card__table">
                   <!-- Create table here -->
               </div>
               <!-- Ancre element for redirecting to the pop up part -->
               <a href="#popup">Vieuw chart!</a>
           </div>
       </div>
   </div>
   </div>
   ';
          }  
    }
    
}




$cards = new Card();
// var_dump($obj);
echo $cards->createSelf();
?>






















<?php
require_once('functions.php');
    
    //CONNECT 
    $connection = db_connect();

    // Query uitvoeren met de laatste 100 waardes
    $query = "SELECT * FROM sensor ORDER BY sensorid";
    $result_set = mysqli_query($connection, $query);

    // De ontvangen resultaten gebruiken
    $subject = mysqli_fetch_all($result_set, MYSQLI_ASSOC);

    // De ontvangen resultaten loslaten
    mysqli_free_result($result_set);

    // De verbinding met de database afsluiten
    mysqli_close($connection);

    // Array tonen
    var_dump($subject);
    echo json_encode($subject);
?>















<?php

//     class Verkeersord{

//     function __construct($shape){
//         // this.shape = "";
//         $this->shape = $shape;
//     }

//     function showShape(){
//         echo($shape);
//     }
// }

// var_dump(new Verkeersord("circle"));

// class CircularVerkeersbord extends Verkeersord{
//     function __construct(){
//         $this->shape = "Cirrcular";
//     }
// }



// var_dump(new CircularVerkeersbord());



// class Stopbord extends CircularVerkeersbord{
    
//     function __construct(){
//         super();
//     }
// }

// $stopbord = new Stopbord();
// stopbord.showShape(); 
?>

















<?php

// class CardHandler{

//     function __construct(){
//        // 
//     }

//     function createCard(){
//      //   
//     }

//     function display(){
//        // 
//     }
// }

// var_dump(new Verkeersord("circle"));


?>