<?php
 global $numberOfCards;

 //--|-1 for offset array
 for ($cardIndex = 0; $cardIndex <= ($numberOfCards - 1); $cardIndex++) {

    //--|CREATE A VARIABLE THAT HOLDS THE LAST VALUE OF THE TABLE
    $last_value = "";
    foreach($this->cards->tableValues[$cardIndex] as $value){
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
            '.$this->cards->values[$cardIndex]["name"].'
            </span>
        </h4>
        <div class="card__details">
            <ul>
                <li class="card_details_ids">Sensor id: '.$this->cards->values[$cardIndex]["sensor_id"].'</li>
                <li>Last value: '.$last_value.'</li>
                <li>Type: '.$this->cards->values[$cardIndex]["type"].'</li>
                <li>Unit: '.$this->cards->values[$cardIndex]["unit"].'</li>
            </ul>
        </div>
    </div>
    <div class="card__side card__side--back card__side--back-1">
        <div class="card__cta">
            <div>

            <form action="php/delete.php" method="POST">
            <input type="hidden" name="action" value="delete" />
            <input type="hidden" name="sensor_id" value='.$this->cards->values[$cardIndex]["sensor_id"].'/>
            <input class="popup__close--delete" type="submit" value="Delete sensor &#8595"/>
            </form>

            <div class="card__table__th">
            </div>
            <table class="card__table">
            ';

         foreach($this->cards->tableValues[$cardIndex] as $key => $value){
            echo '
                <tr class="card__table__tr">
                <form action="php/delete.php" method="POST">
                <input type="hidden" name="action" value="deleteButton" />
                <input type="hidden" name="data_id" value='.$this->cards->tableIds[$cardIndex][$key]["data_id"].'/>

                <td class="card__table__td__value"> Value: '.$value["value"].' </td>
                <td class="card__table__td__value">Id: '.$this->cards->tableIds[$cardIndex][$key]["data_id"].' <input type="submit" value="Del"/></td>
                </form>
                </tr>
            ';
        }
         echo '  
         </table>
            </div>
            <a class="container" href="#popup">
            <!-- <input class="chartDisplayers" type="button" data-target="sensor_id_'.$cardIndex.'" value="view chart!"/> -->
            <input class="chartDisplayers" type="button" data-target="sensor_id_'.$cardIndex.'" value="view chart!"/>
            </a>
        </div>
    </div>
</div>
</div>
';
  }
?>
