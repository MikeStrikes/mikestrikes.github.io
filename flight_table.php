


 <center><h1>Available Flights</h1></center>

<?php //   function NewList($airline,$flightnumber,$departure,$destination,$departure_time,$arrival_time,$price){
    //
    // echo "<tr>";
    // echo "<td>".$airline."</td>";
    // echo "<td>".$flightnumber."</td>";
    // echo "<td>".$departure."</td>";
    // echo "<td>".$destination."</td>";
    // echo "<td>".$departure_time."</td>";
    // echo "<td>".$arrival_time."</td>";
    // echo "<td>".$price."</td>";
    //
    // echo "</tr>";


//  } ?>



<style media="screen">
#available_flights {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#available_flights td, #available_flights th {
    border: 1px solid #ddd;
    padding: 8px;
}

#available_flights tr:nth-child(even){background-color: #f2f2f2;}

#available_flights tr:hover {background-color: #ddd;}

#available_flights th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
<?php if(isset($_POST['submit'])){ ?>
<form class="" method="post">


<table style="width:50%;margin:auto;" id = "available_flights">
  <th>Airline</th><th>Flight #</th><th>Departure Time</th><th>Arrival Time</th><th>Departure Ariport</th><th>Arrival Airport</th><th>Price</th>
  <?php
  for($j = 0;$j<=count($flights)-1;$j++){

    if($flights[$j]['departure_airport'] == $_POST['departure'] && $flights[$j]['arrival_airport'] == $_POST['destination'] ){

      echo "<tr>";
      echo "<td>".$flights[$j]['airline']."</td>";
      echo "<td>".$flights[$j]['number']."</td>";
      echo "<td>".$flights[$j]['departure_time']."</td>";
      echo "<td>".$flights[$j]['arrival_time']."</td>";
      echo "<td>".$flights[$j]['departure_airport']."</td>";
      echo "<td>".$flights[$j]['arrival_airport']."</td>";
      echo "<td>".$flights[$j]['price']."</td>";
      echo "<td>

      <input type='radio' name='send' value='".$flights[$j]['number']."'>

      </td>";
      echo "</tr>";
if($j == count($flights)-1){
  echo '<td><input type="submit" name="submit" value="submit"></td>';
}
      $remember = $flights[$j]['number'];
    }

  }
}
$_POST = array();

   ?>

</table>
</form>

<script type="text/javascript">

</script>
<div class="modal fade" id="confirm_flight" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background :#31638f;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Flight details</h4>
        </div>
        <div id = "modal-bodyss"class="modal-body">
<script type="text/javascript">
$("tr").click(function() {
    var first_flight = $(this).children("td").map(function() {
        return $(this).text();
    }).get();
});
</script>

<?php


 ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
