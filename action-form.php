<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>



    <table style="width:100%">

    <?php


for($j = 0;$j<=1;$j++){
  if($flights[$j]['departure_airport'] == $_POST['departure'] && $flights[$j]['arrival_airport'] == $_POST['destination'] ){
    NewList($flights[$j]['airline'], $flights[$j]['number'], $flights[$j]['departure_airport'], $flights[$j]['departure_time'], $flights[$j]['arrival_airport'], $flights[$j]['arrival_time'], $flights[$j]['price']);
  }

}


function NewList($airline,$flightnumber,$departure,$destination,$departure_time,$arrival_time,$price){
  echo "<tr>";
echo "<td>".$airline."</td>";
echo "<td>".$flightnumber."</td>";
echo "<td>".$departure."</td>";
echo "<td>".$destination."</td>";
echo "<td>".$departure_time."</td>";
echo "<td>".$arrival_time."</td>";

  echo "</tr>";


}
     ?>
   </tr>


  </body>
</html>
