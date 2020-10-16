<?php
 global $numberOfCards;

 //--|-1 for offset array
 for ($x = 0; $x <= ($numberOfCards - 1); $x++) {

    //--|CREATE A VARIABLE THAT HOLDS THE LAST VALUE OF THE TABLE
    $last_value = "";
    foreach($this->cards->tableValues[$x] as $value){
        $last_value = (end($value));
    }

    echo '
    <div class="card" id="card">
    <div class="card__side card__side--front">
        <div class="card__picture card__picture--1">
            &nbsp;
            <!-- <- Empy  space -->
        </div>
        <h4 class="card__heading">
            <span class="card__heading-span card__heading-span-1">
            '.$this->cards->values[$x]["name"].'
            </span>
        </h4>
        <div class="card__details">
            <ul>
                <li class="card_details_ids">Sensor id: '.$this->cards->values[$x]["sensor_id"].'</li>
                <li>Last value: '.$last_value.'</li>
                <li>Type: '.$this->cards->values[$x]["type"].'</li>
            </ul>
        </div>
    </div>
    <div class="card__side card__side--back card__side--back-1">
        <div class="card__cta">
            <div>

            <form action="php/delete.php" method="POST">
            <input type="hidden" name="action" value="delete" />
            <input type="hidden" name="sensor_id" value='.$this->cards->values[$x]["sensor_id"].'/>
            <input class="popup__close--delete" type="submit" value="Delete sensor &#8595"/>
            </form>

            <div class="card__table__th">
            </div>
            <table class="card__table">
            
         ';

         foreach($this->cards->tableValues[$x] as $value){
            echo '
            <tr class="card__table__tr">
            <td class="card__table__td__value">'.$value["value"].'</td>
            </tr>
                ';
         }

         echo '
         </table>
            </div>
            <a class="container" href="#popup">
            <input class="chartDisplayers" type="button" value="view chart!"/>
            </a>
        </div>
    </div>
</div>
</div>
';
  }
?>




<!-- <td class="card__table__td__number">'.$this->cards->dataid[$i]["data_id"].'</td> -->