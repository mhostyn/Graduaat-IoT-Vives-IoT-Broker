<?php

 require_once('functions.php');

class CardsBuilder{
    function __construct(){
        $selectAll = "SELECT * FROM sensor ORDER BY sensorid";
        $this->values = $this->setValues($selectAll);

        $selectLastTen = "SELECT value FROM data";
        $this->tableValues = $this->setValues($selectLastTen);
        var_dump($this->tableValues);
    }

    function setValues($query){
        $values = new DbValues();
        return $values->getValues($query);
    }

    function build(){
        return $this->values;
    }
}

class CardDisplayer{
    function __construct(){
        $cards = new CardsBuilder();
        $this->cards = $cards->build();
    }

    function displayCards(){

         global $numberOfCards;

         //-1 for offset array
         for ($x = 0; $x <= ($numberOfCards - 1); $x++) {

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
                       <li>Sensor id:'.$this->cards[$x]["sensorid"].'</li>
                       <li>Last seen: '.$this->cards[$x]["timestamp"].'</li>
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

class DbValues{

    function getValues($query){
          //CONNECT 
          $connection = db_connect();

          // Build query
          $result_set = mysqli_query($connection, $query);
  
          // Use results
          $values = mysqli_fetch_all($result_set, MYSQLI_ASSOC);
  
          global $numberOfCards;
          $numberOfCards = count($values);

          // Dump results from memory
          mysqli_free_result($result_set);
  
          // Close DB connection
          mysqli_close($connection);

        //   var_dump($values);
          return $this->cards = $values;
    }
}



$cardDisplayer = new CardDisplayer();
$cardDisplayer->displayCards();
?>