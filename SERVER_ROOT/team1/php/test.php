<?php
//Define variables to use in the CardBuilder class
$numberOfCards;


class Card{
    function __construct($name){
        $this->name = $name;
    }
}

class CardBuilder{

    function __construct($name){
        $this->card = new Card($name);
    }

    function setValues(){
        require_once('functions.php');

        //CONNECT 
        $connection = db_connect();

        // Build query
        $query = "SELECT * FROM sensor ORDER BY sensorid";
        $result_set = mysqli_query($connection, $query);

        // Use results
        $values = mysqli_fetch_all($result_set, MYSQLI_ASSOC);

        global $numberOfCards;
        $numberOfCards = count($values);

        var_dump($values);

        $this->card->sensorId = $values[0]["sensorid"];
        $this->card->userId = $values[0]["user_id"];
        $this->card->sensorname = $values[0]["sensorname"];
        $this->card->type = $values[0]["type"];
        $this->card->unit = $values[0]["unit"];
        $this->card->timestamp = $values[0]["timestamp"];

        // Dump results from memory
        mysqli_free_result($result_set);

        // Close DB connection
        mysqli_close($connection);

        return $this;
    }

    function build(){
        return $this->card;
    }
}

class CardDisplayer{
    function __construct($card){
        //Display Card in here
        
        global $numberOfCards;

         for ($x = 0; $x <= $numberOfCards; $x++) {

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

$card = new CardBuilder("cardOne");
var_dump($card->setValues()->build());

$test = new CardDisplayer($card);
?>