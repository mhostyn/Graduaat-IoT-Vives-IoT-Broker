<?php
 global $numberOfCards;

 //--|-1 for offset array
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
            '.$this->cards->values[$x]["name"].'
            </span>
        </h4>
        <div class="card__details">
            <ul>
                <li>Sensor id:'.$this->cards->values[$x]["sensor_id"].'</li>
                <li>Last seen:</br>'.$this->cards->values[$x]["created"].'</li>
            </ul>
        </div>
    </div>
    <div class="card__side card__side--back card__side--back-1">
        <div class="card__cta">
            <div>
            <div class="card__table__th">
            Last Values
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
            <!-- Ancre element for redirecting to the pop up part -->
            <a href="#popup">Vieuw chart!</a>
        </div>
    </div>
</div>
</div>
';
  }
?>




<!-- <td class="card__table__td__number">'.$this->cards->dataid[$i]["data_id"].'</td> -->