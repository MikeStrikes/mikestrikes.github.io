<?php
include 'airport_data.php';
session_start();
$goingthrough = false;
$FlightTime;
$picked;
$flightHelper;

for ($x=0; $x <=10 ; $x++) {

}
  function MatchCity($departure,$airports){

    for($x = 0;$x<= count($airports) - 1;$x++){
      if($airports[$x]['code'] == $departure){
        return $airports[$x]['city'];
      }
    }

  }

  function MatchAirports($departure,$airports){

    for($x = 0;$x<= count($airports) - 1;$x++){
      if($airports[$x]['code'] == $departure){
        return $airports[$x]['timezone'];
      }
    }

  }
  function MatchAirports2($destination,$airports){

    for($x = 0;$x<= count($airports) - 1;$x++){
      if($airports[$x]['code'] == $destination){
        return $airports[$x]['timezone'];
      }
    }

  }
  function DepartureDate($departureDate,$timezone,$DestinationTimezone,$DepartTime,$ArrivalTime){
    $date = date_create($departureDate, timezone_open($timezone));
    $timediffrence1 = date_format($date, 'Y-m-d H:i:sP');
    $Time_Diffrence_hours = substr($timediffrence1,-5,-3);
    $Time_Diffrence_minutes = substr($timediffrence1,-2);
    $time_diffrence_hours_and_minutes = $Time_Diffrence_hours."". $Time_Diffrence_minutes;
    date_timezone_set($date, timezone_open($DestinationTimezone));
    $timediffrence2= date_format($date, 'Y-m-d H:i:sP');
    $Time_Diffrence2_hours = substr($timediffrence2,-5,-3);
    $Time_Diffrence2_minutes = substr($timediffrence2,-2);
    $time_diffrence_hours_and_minutes2 = $Time_Diffrence2_hours ."".$Time_Diffrence2_minutes;
    if($time_diffrence_hours_and_minutes <= $time_diffrence_hours_and_minutes2){

      $AddingHours = ($Time_Diffrence2_hours - $Time_Diffrence_hours);
      // OK NOW GET THE DIFFRENCE OF BOTH LAND AND TAKE OFF TIMES AND ADD 3 HOURSE TO IT

      $AddingMinutes = ($Time_Diffrence2_minutes - $Time_Diffrence_minutes);
      $start = date_create('2015-01-26 '.$DepartTime.'');
      $end = date_create('2015-01-26 '.$ArrivalTime.'');
      $diff=date_diff($end,$start);


      $date = new DateTime('2000-01-01 00:00:00');
      $date->add(new DateInterval('PT'.$diff->h.'H'. $diff->i .'M'));
      $date->add(new DateInterval('PT'.$AddingHours.'H'. $AddingMinutes .'M'));
      $FullFlightTime = $date->format('Y-m-d H:i:s') . "\n";
      $FlightTime;

      if(substr($FullFlightTime,-9,1) == "0"){
        $FlightTime = substr($FullFlightTime,-8);

      }else{
        $FlightTime= substr($FullFlightTime,-9);
      }

      echo $FlightTime;
    }else {

      $AddingHours = ( $Time_Diffrence_hours - $Time_Diffrence2_hours);
      // OK NOW GET THE DIFFRENCE OF BOTH LAND AND TAKE OFF TIMES AND ADD 3 HOURSE TO IT

      $AddingMinutes = ($Time_Diffrence_minutes- $Time_Diffrence2_minutes );
      $start = date_create('2015-01-26 '.$DepartTime.'');
      $end = date_create('2015-01-26 '.$ArrivalTime.'');
      $diff=date_diff($end,$start);


      $date = new DateTime('2000-01-01 00:00:00');
      $date->add(new DateInterval('PT'.$diff->h.'H'. $diff->i .'M'));
      $date->sub(new DateInterval('PT'.$AddingHours.'H'. $AddingMinutes .'M'));
      $FullFlightTime = $date->format('Y-m-d H:i:s') . "\n";
      $FlightTime;

      if(substr($FullFlightTime,-9,1) == "0"){
        $FlightTime = substr($FullFlightTime,-8);

      }else{
        $FlightTime= substr($FullFlightTime,-9);
      }

      echo $FlightTime;
    }
  }

  ?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>



    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
  </head>
  <body style="background:#e8e8e8;">
    <div >
      <center><h1 style="font-size:52px;"><img src="images/logo.png" alt = "logo" style="vertical-align: middle;"/>Momentum Travel</h1></center>
    </div>
    <div class="banner-top">
      <div>
        <h2 style="width:100%;margin-bottom:0px;"class = "title" >Book your dream vacation today!</h2>

        <h2  class = "sub-title" style="padding-top:0px; width:100%">Canada and beyond</h2>

      </div>

    </div>
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

    <?php
    //diffrence + time zone diffrence

    ?>
    <h1>Available Flights</h1>
    <form class="" method="POST">


      <table style="width:50%;margin:auto;" id = "available_flights">
        <th>Selected</th><th>Airline</th><th>Flight #</th><th>Departure Time</th><th>Arrival Time</th><th>Departure Ariport</th><th>Arrival Airport</th><th>Price</th><th>Flight Time</th>
        <?php
        for($j = 0;$j<=count($flights)-1;$j++){

          if($flights[$j]['departure_airport'] == $_GET['departure'] && $flights[$j]['arrival_airport'] == $_GET['destination'] ){
            $timezone = MatchAirports($flights[$j]['departure_airport'],$airports);
            $timezone2= MatchAirports2($flights[$j]['arrival_airport'],$airports);

            echo "<tr>";
            echo "<td>


            <center><input type='radio' name='send' value='".$flights[$j]['number']."'></center>

            </td>";
            echo "<td>".$flights[$j]['airline']."</td>";
            echo "<td>".$flights[$j]['number']."</td>";
            echo "<td>".$flights[$j]['departure_time']."</td>";
            echo "<td>".$flights[$j]['arrival_time']."</td>";
            echo "<td>".$flights[$j]['departure_airport']."</td>";
            echo "<td>".$flights[$j]['arrival_airport']."</td>";
            echo "<td>".$flights[$j]['price']."</td>";

            echo "<td>";

            ?><input type="hidden" name="<?php echo $flights[$j]['number']; ?>" id = "nocheck"value="<?php DepartureDate($_GET['departure_date'],$timezone,$timezone2,$flights[$j]['departure_time'],$flights[$j]['arrival_time']) ?>" ><?php

            DepartureDate($_GET['departure_date'],$timezone,$timezone2,$flights[$j]['departure_time'],$flights[$j]['arrival_time']);
            echo "</td>";
            echo "</tr>";



            if($j == count($flights)-1){

            }
            $remember = $flights[$j]['number'];
          }

        }



        ?>

      </table>
      <?php   echo '<center><input type="submit" name="submit" value="submit"></center>'; ?>
    </form>
    <?php


    ?>
    <style media="screen">
    .custom{
      float: right;
      height: 200px;
    }
    </style>
    <div class="modal fade" id="confirm_flight" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background :#31638f;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Flight details</h4>
          </div>
          <div id = "modal-bodyss"class="modal-body" style="font-weight:bold;">
            <h3 style="float:left;">
              <?php
              for($x = 0;$x<=count($flights) -1;$x++){
                if($flights[$x]['number'] == $_POST['send']){
                  $picked = $x;
                  $flightHelper = $_POST['send'];

                  echo  "".MatchCity($flights[$x]['departure_airport'],$airports);
                  echo " To ";
                  echo  "".MatchCity($flights[$x]['arrival_airport'],$airports);
                  echo "<br>".$_GET['departure_date'];
                }
              }
              ?>
            </h3>
            <div class="custom">
              <h3 style="float:right;">Total Duration</h3>
              <h4><?php echo $_POST[$flightHelper]; ?></h4>
<form class=""  method="post" action = "bothflights.php">
  <input type="submit" name="LastBooked" value="Book">
</form>
            </div>

          </div>
<div class="" style="padding-top:15%;padding-left:5%;">
  <text style="font-weight:bold;">

<?php echo $flights[$picked]['departure_time']. " ";
      echo MatchCity($flights[$picked]['departure_airport'],$airports). " ";
      echo "(".$_GET['departure'].")";
      echo " to ";
    echo $flights[$picked]['arrival_time']." ";
        echo MatchCity($flights[$picked]['arrival_airport'],$airports). " ";
      echo "(".$_GET['destination'].")";
 ?>
</text>
<?php echo " - ".$_POST[$flightHelper]; ?>

<br>
<?php
echo $flights[$picked]['airline']. " ";
echo $flights[$picked]['number'];

 ?>
</div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <?php echo $timezone; ?>
    <?php

    if(isset($_POST['submit']) && isset($_POST['send'])){

      $_SESSION['fly_time_2'] = $_POST[$flightHelper];


      $_SESSION['price_2'] = $flights[$picked]['price'];
      $_SESSION['airline_2'] = $flights[$picked]['airline'];
      $_SESSION['number_2'] = $flights[$picked]['number'];
      $_SESSION['departure_time_2'] = $flights[$picked]['departure_time'];
      $_SESSION['arrival_time_2'] = $flights[$picked]['arrival_time'];

      ?>
      <script type="text/javascript"> $('#confirm_flight').modal('show'); </script>
      <?php

    }

    if(isset($_POST['submit2'])){

    }
    ?>














  </body>
  </html>
