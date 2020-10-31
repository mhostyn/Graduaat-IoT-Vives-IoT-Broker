<?php


global $numberOfCards;

//--|-1 for offset array
for ($cardIndex = 0; $cardIndex <= ($numberOfCards - 1); $cardIndex++) {
   echo '
   <div class="card" id="card">
   <div class="card__side card__side--front">
       <div class="card__picture card__picture--1">
           &nbsp;
           <!-- <- Empy  space -->
       </div>
       <h4 class="card__heading">
           <span class="card__heading-span card__heading-span-1">
           '.html($this->cards->values[$cardIndex]["name"]).'
           </span>
       </h4>
       <div class="card__details">
           <ul>
               <li class="card_details_ids">Sensor id: '.html($this->cards->values[$cardIndex]["sensor_id"]).'</li>
               ';
               if(!isset($this->cards->lastValue[$cardIndex][0]["value"])){
                $this->cards->lastValue[$cardIndex][0]["value"] = "/";
               }

               echo '
               <li>Last value: '.html($this->cards->lastValue[$cardIndex][0]["value"]).'</li>
               <li>Type: '.html($this->cards->values[$cardIndex]["type"]).'</li>
               <li>Unit: '.html($this->cards->values[$cardIndex]["unit"]).'</li>
           </ul>
       </div>
   </div>
   <div class="card__side card__side--back card__side--back-1">
       <div class="card__cta">
           <div>

           <form action="php/delete.php" method="POST">
           <input type="hidden" name="action" value="delete" />
           <input type="hidden" name="sensor_id" value='.html($this->cards->values[$cardIndex]["sensor_id"]).'/>
           <input class="popup__close--delete__sensor" type="submit" value="Delete sensor &#8595"/>
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
               <input type="hidden" name="data_id" value='.html($this->cards->tableIds[$cardIndex][$key]["data_id"]).'/>
               <td class="card__table__td__value"> Value: '.html($value["value"]).' </td>
               <td class="card__table__td__value">Id: '.html($this->cards->tableIds[$cardIndex][$key]["data_id"]).' <input class="popup__close--delete__data" type="submit" value="Del"/></td>
               </form>
               </tr>
           ';
       }
        echo '  
        </table>
           </div>
           <a class="container" href="#popup">
           <!-- <input class="chartDisplayers" type="button" data-target="sensor_id_'.html($cardIndex).'" value="view chart!"/> -->
           <input class="chartDisplayers" type="button" data-target="sensor_id_'.html($cardIndex).'" value="view chart!"/>
           </a>
       </div>
   </div>
</div>
</div>
';
 }
?>
