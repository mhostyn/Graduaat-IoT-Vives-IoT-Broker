<?php
require_once('functions.php');

class CardsBuilder{
    function __construct(){
        //---|CREATE AL YOUR QUERYS IN HERE
        include 'create_querys.php';
    }

    //---|CREATE A FUNCTION THAT SETS A VALUES OF THE CARD OBJECT (PARAM IS EQUAL TO A SQL-QUERY)
    function setValues($query){ 
        $values = new DbValues();
        return $values->getValues($query);
    }

    //---|CREATE A FUNCTION THAT RETURNS ((THIS) = CARD)
    function build(){
        return $this;
    }
}

class CardDisplayer{
    function __construct(){
        //---|BUILD A CARD IN THE CONSTRUCTOR FUNCTION WICH WILL BE DISPLAYED
        $cards = new CardsBuilder();
        $this->cards = $cards->build();
    }

    function displayCards(){
        //SET THE HTML DISPLAY HERE
        include 'card_display.php';
    }
}


class DbValues{

    //--|THIS FUNCTION RETURNS THE VALUES OF THE $QUERY, ($QUERY = SQL STRINGQUERY)
    function getValues($query){
          //---|CONNECT
          $connection = db_connect();

          //---|BUILD QUERY
          $result_set = mysqli_query($connection, $query);

          //---|USE RESULTS
          $values = mysqli_fetch_all($result_set, MYSQLI_ASSOC);

          //---|DUMP FROM MEMORY
          mysqli_free_result($result_set);

          //---|CLOSE CONNECTION
          mysqli_close($connection);

          //---|RETURN THE RETURNED VALUES FROM THE DB TO THE CARD
          return $this->cards = $values;
    }
}

//---|INITIALIZE A NEW CARDDISPLAYER AND USE THE DISPLAY FUNCTION OF IT
$cardDisplayer = new CardDisplayer();
$cardDisplayer->displayCards();
?>




<!-- 
                                                            GLOBAL EXPLAINING 

//--|   A CARD HAS TWO THINGS TO DO (GET VALUES AND DISPLAY THEM ON THE SCREEN)
//--|   TO CREATE A DRY READABLE FILE WHE TRIED TO ENCAPSULATE EACH ELEMENT OF THE CARD
//--|   ENCAPSULATE = HANDELING THE BUILDING, DISPLAY, DATABASE (CARDBUILDER, CARDDISPLAYER & DBVALUES).
//--|   
//--|   THERE ARE MULTIPLE FILES WICH IS USED FOR READABILITY AND HANDELING SPECIFIC DATA A.G 'db_initialize.php, function.php' 

-->