<?php
function EarliestDeparture(){
  for ($x=0; $x <= 10 ; $x++) {
    if(isset($_SESSION['EXTRA_DEPARTURE'.$x.''])){
        $Last['departure'] = $_SESSION['EXTRA_DEPARTURE'.$x.''];
        $Last['destination'] = $_SESSION['EXTRA_DESTINATION'.$x.''];
        $Last['date_departure'] = $_SESSION['EXTRA_DATE_DEPARTURE'.$x.''];
        unset($_SESSION['EXTRA_DEPARTURE'.$x.'']);
        unset($_SESSION['EXTRA_DESTINATION'.$x.'']);
        unset($_SESSION['EXTRA_DATE_DEPARTURE'.$x.'']);
      return ($Last);
    }
  }

}

function ShowNextPage($departure,$departure_date,$destination){
  sessionsaver();
  var_dump($_SESSION);
  if($departure == ""){
      exit(header("Location: multi-flights.php"));

  }

  unset($_POST);
$_POST = array();
  $url = "multi_city.php?departure=".$departure."&destination=".$destination."&departure_date=".$departure_date;
  exit(header("Location: ".$url));
}

function sessionsaver(){

  if(isset($_SESSION['picked_departure'])){
   for ($x=0; $x <=10 ; $x++) {
     if(!isset($_SESSION['saved-departure'.$x.''])){
      $_SESSION['saved-fly-time'.$x.''] =$_SESSION['picked_fly_time'] ;
       $_SESSION['saved-departure'.$x.''] = $_SESSION['picked_departure'];
       $_SESSION['saved-destination'.$x.''] = $_SESSION['picked_destination'];
       $_SESSION['saved-departure-city'.$x.''] = $_SESSION['picked_departure_city'];
       $_SESSION['saved-arrival-city'.$x.''] = $_SESSION['picked_arrival_city'];
       $_SESSION['saved-departure-date'.$x.''] = $_SESSION['picked_departure_date'];
       $_SESSION['saved-price'.$x.''] = $_SESSION['picked_price'];
       $_SESSION['saved-airline'.$x.''] = $_SESSION['picked_airline'];
       $_SESSION['saved-number'.$x.''] = $_SESSION['picked_number'];
       $_SESSION['saved-departure-time'.$x.''] = $_SESSION['picked_departure_time'];
       $_SESSION['saved-arrival-time'.$x.''] = $_SESSION['picked_arrival_time'];


       break;

     }

    }
   }

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
