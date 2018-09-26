<?php
include 'airport_data.php';
$goingthrough = true;
if (session_status() == PHP_SESSION_NONE) {

    session_start();

    $_SESSION = array();
}else{

}
ob_start();

function leave(){


  $url = "available_flights.php?departure=".$_POST['departure']."&destination=".$_POST['destination']."&departure_date=".$_POST['departure_date']."&return_date=".$_POST['return_date']."&trip=".$_POST['trip'];
  exit(header("Location: ".$url.""));
}
function multicity(){


  $url = "multi_city.php?departure=".$_POST['departure']."&destination=".$_POST['destination']."&departure_date=".$_POST['departure_date']."&return_date=".$_POST['return_date']."&trip=".$_POST['trip'];
  exit(header("Location: ".$url));

//  $url = "available_flights.php?departure=".$_POST['departure']."&destination=".$_POST['destination']."&departure_date=".$_POST['departure_date']."&return_date=".$_POST['return_date']."&trip=".$_POST['trip'];
//  exit(header("Location: ".$url));
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
  <script>
  var stuff = 0;
var addedFields = false;
$(document).ready(function(){
  $("#add_flight").on('click', function(){
      addedFields = true;
    stuff = (stuff + 1);
    if(stuff <=10){


       $('#duplicate').append('<p style="float:left; margin-bottom:0px;width:100%;visibility:visible;" id = "duplicated">Departure Date:<input type="date" style="width:25%;" name = "departure_date' + stuff +'" id="datepicker"><p style="float:left; margin-bottom:0px;width:100%;visibility:visible;" id = "nothing"><text>From</text><select id="from'+ stuff +'"" name="departure'+ stuff +'" style="width:40%;"><?php for ($x=0; $x <= count($airports) -1 ; $x++) {?>
       <option value="<?php echo $airports[$x]['code']; ?>"><?php echo $airports[$x]['city']; ?>, <?php echo $airports[$x]['code']; ?></option><?php } ?></select><text style="right:0px;">To: </text> <select id="to' + stuff +'"" name="destination'+ stuff +'"style="width:40%;"><?php for ($x=0; $x <= count($airports) -1 ; $x++) {?>
       <option value="<?php echo $airports[$x]['code']; ?>"><?php echo $airports[$x]['city']; ?>, <?php echo $airports[$x]['code']; ?></option><?php } ?></select></p>');
}else{
  alert("You've reached the Max!")
}

   });

});
</script>
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
      <div class="form-style-5" style="margin-top:-91px;">

        <form method="post" >
          <fieldset>
            <legend><span class="number">1</span> Flight Info</legend>
            <text class="radio-buttons">Round-trip <text><input type="radio" id = "yescheck" name="trip" value="round-trip"  onclick="javascript:yesnoCheck();" checked = "checked">
              <text class="radio-buttons">One-way <text><input type="radio" name="trip" id = "nocheck" value="one-way" onclick="javascript:yesnoCheck();">
                <text class="radio-buttons">Multi-city <text><input type="radio" name="trip" id = "multicitycheck" value="multi-city" onclick="javascript:yesnoCheck();">
                  <button id = "add_flight" type="button" name="button" style="visibility:hidden;">Add Flight</button><br>
                  <text class="radio-buttons">Airline Filter <text><input type="checkbox" name="filter" id = "filterchekbox" value="filterd" onclick="javascript:filtercheck();">
                    <text class="radio-buttons" id = "ACTEXT" style="visibility:hidden">Air Canada </text><input type="radio" id = "AC_CHECKBOX" name="filter" value="AC"  onclick="" style="visibility:hidden">
                    <text class="radio-buttons" id = "WestJet" style="visibility:hidden">West Jet </text><input type="radio" id = "WestJet2" name="filter" value="WestJet"  onclick="" style="visibility:hidden">
                <p style="float:left; margin-bottom:0px;width:100%;">Departure Date: <input type="date" style="width:25%;" name = "departure_date" id="datepicker"> <text id = "returndate">Return Date: <input name = "return_date" style="width:25%;"type="date" id="datepicker2"> </text></p>
                <p style="float:left; margin-bottom:0px;width:100%;" id = "duplicate"><text>From</text>
                  <select id="from" name="departure" style="width:40%;">
                    <?php for ($x=0; $x <= count($airports) -1 ; $x++) {?>
                    <option value="<?php echo $airports[$x]['code']; ?>"><?php echo $airports[$x]['city']; ?>, <?php echo $airports[$x]['code']; ?></option>

                  <?php } ?>
                </select><text style="right:0px;">To: </text> <select id="to" onclick = "javascript:firstfill();" name="destination"style="width:40%;">

                    <?php for ($x=0; $x <= count($airports) -1 ; $x++) {?>
                    <option value="<?php echo $airports[$x]['code']; ?>"><?php echo $airports[$x]['city']; ?>, <?php echo $airports[$x]['code']; ?></option>

                  <?php } ?>
                  </select></p>







              </fieldset>

              <input type="submit" name = "submit" value="submit" />
            </form>
          </div>
          <h1 id = "demo"></h1>

          <script>
          function Fillnext(number){
            try {
              alert(number);
              document.getElementById('from').value = document.getElementById('to').value;
            } catch (e) {
              console.error(e);
            } finally {

            }

          }
          function firstfill(){
            try {
              document.getElementById('from1').value = document.getElementById('to').value;

            } catch (e) {
              console.error(e);
            } finally {

            }

          }
          function filtercheck(){
            if (document.getElementById('filterchekbox').checked) {
              document.getElementById('ACTEXT').style.visibility = 'visible';
              document.getElementById('AC_CHECKBOX').style.visibility = 'visible';
              document.getElementById('WestJet').style.visibility = 'visible';
              document.getElementById('WestJet2').style.visibility = 'visible';
            }else{
              document.getElementById('ACTEXT').style.visibility = 'hidden';
              document.getElementById('AC_CHECKBOX').style.visibility = 'hidden';
              document.getElementById('WestJet').style.visibility = 'hidden';
              document.getElementById('WestJet2').style.visibility = 'hidden';
            }
          }

          function yesnoCheck() {
            if (document.getElementById('nocheck').checked) {
              if(addedFields){
              window.location.replace("index.php");
              }
              document.getElementById('returndate').style.visibility = 'hidden';
              document.getElementById('add_flight').style.visibility = 'hidden';
              document.getElementById('duplicated').style.visibility = 'hidden';
              document.getElementById('nothing').style.visibility = 'hidden';
            }
            if (document.getElementById('multicitycheck').checked) {

              document.getElementById('add_flight').style.visibility = 'visible';
              document.getElementById('returndate').style.visibility = 'hidden';
            }
            if (document.getElementById('yescheck').checked) {

              if(addedFields){
              window.location.replace("index.php");
              }
              document.getElementById('returndate').style.visibility = 'visible';
              document.getElementById('add_flight').style.visibility = 'hidden';
              document.getElementById('duplicated').style.visibility = 'hidden';
              document.getElementById('nothing').style.visibility = 'hidden';

            }



          }






          </script>













<?php

          if(isset($_POST['submit']) && $_POST['departure_date'] != "" && $_POST['departure_date'] != $_POST['return_date'] && $_POST['departure'] !=  $_POST['destination'] && $_POST['trip'] == "round-trip" && $_POST['return_date'] != ""){

            $goingthrough = true;
            $today = getdate();



            $departyear = substr($_POST['departure_date'], -10, -6);

            $departmonth = substr($_POST['departure_date'], -5, -3);

            $departday = substr($_POST['departure_date'], -2);

            $returnyear = substr($_POST['return_date'], -10, -6);

            $returnmonth = substr($_POST['return_date'], -5, -3);

            $returnday = substr($_POST['return_date'], -2);
            $date1=date_create("".$departyear."-".$departmonth."-".$departday."");
            $date2=date_create("".$today['year']."-".$today['mon']."-".$today['mday']."");
            $date3=date_create("".$returnyear."-".$returnmonth."-".$returnday."");
            $todayAndDeparture=date_diff($date2,$date1);
            $departurechecksign = $todayAndDeparture->format("%R");
            $departurecheckdays = $todayAndDeparture->format("%a");

            $departureandreturn = date_diff($date1,$date3);
            $departureandreturnchecksign = $departureandreturn->format("%R");
            $departureandreturncheckdays =  $departureandreturn->format("%a");


            if($departureandreturnchecksign == "-"){
              $goingthrough = false;
            }

            if($departurechecksign == "-" || $departurecheckdays >=365){
              $goingthrough = false;
            }


            if($departyear >= $today['year']){


            }else{

              $goingthrough = false;
            }

            if($departmonth >= $today['mon']){

            }else{
              $goingthrough = false;
            }

            if($departday >= $today['mday']){

            }else{
              if($departmonth >= $today['mon']){

              }else{
              $goingthrough = false;
              }
            }

            if($returnyear >= $departyear){

            }else{
              $goingthrough = false;
            }

            if($returnmonth >= $departmonth){

            }else{
              $goingthrough = false;
            }

            if($returnday >= $departday){

            }else{

              if($returnmonth >= $departmonth){

              }else{
                $goingthrough = false;
              }
            }
            if($goingthrough){
              echo "hi";
              if(isset($_POST['filter']) && $_POST['filter'] !=""){

                $_SESSION['filter'] = $_POST['filter'];

              }
              leave();


            }else {
              echo "<center><h3 style = 'color:red;'>Please Make sure you've correctly fill the forum</h3></center>";
            }

          }
          if(isset($_POST['submit']) && $_POST['departure_date'] != ""  && $_POST['departure'] !=  $_POST['destination'] && $_POST['trip'] == "one-way"){

            $goingthrough = true;
            $today = getdate();


            $departyear = substr($_POST['departure_date'], -10, -6);

            $departmonth = substr($_POST['departure_date'], -5, -3);

            $departday = substr($_POST['departure_date'], -2);

            $date1=date_create("".$departyear."-".$departmonth."-".$departday."");
            $date2=date_create("".$today['year']."-".$today['mon']."-".$today['mday']."");
            $todayAndDeparture=date_diff($date2,$date1);
            $departurechecksign = $todayAndDeparture->format("%R");
            $departurecheckdays = $todayAndDeparture->format("%a");

            if($departurechecksign == "-" || $departurecheckdays >=365){
              $goingthrough = false;
            }

            if($departyear >= $today['year']){

            }else{
              $goingthrough = false;
            }

            if($departmonth >= $today['mon']){

            }else{
              $goingthrough = false;
            }

            if($departday >= $today['mday']){

            }else{
              if($departmonth >= $today['mon']){

              }else{
              $goingthrough = false;
              }
            }


            if($goingthrough){
              echo "hi";
              if(isset($_POST['filter']) && $_POST['filter'] !=""){
                $_SESSION['filter'] = $_POST['filter'];

              }
              multicity();


            }

          }

          if(isset($_POST['submit']) && $_POST['departure_date'] != ""  && $_POST['departure'] !=  $_POST['destination'] && $_POST['trip'] == "multi-city"){

            $goingthrough = true;
            if(isset($_POST['departure1'])){
              for ($x=1; $x <= 10 ; $x++) {
              if(isset($_POST['departure'.$x.''])){
                if($_POST['departure'.$x.''] ==$_POST['destination'.$x.'']){
                  $goingthrough = false;
                }
                $_SESSION['EXTRA_DEPARTURE'.$x.''] = $_POST['departure'.$x.''];
                $_SESSION['EXTRA_DESTINATION'.$x.''] = $_POST['destination'.$x.''];
                $_SESSION['EXTRA_DATE_DEPARTURE'.$x.''] = $_POST['departure_date'.$x.''];

              }else{
                $_SESSION['EXTRA-AMOUNT'] = $x;
                break;
              }
            }
          }




            $today = getdate();


            $departyear = substr($_POST['departure_date'], -10, -6);

            $departmonth = substr($_POST['departure_date'], -5, -3);

            $departday = substr($_POST['departure_date'], -2);

            $date1=date_create("".$departyear."-".$departmonth."-".$departday."");
            $date2=date_create("".$today['year']."-".$today['mon']."-".$today['mday']."");
            $todayAndDeparture=date_diff($date2,$date1);
            $departurechecksign = $todayAndDeparture->format("%R");
            $departurecheckdays = $todayAndDeparture->format("%a");
            if($departurechecksign == "-" || $departurecheckdays >=365){
              $goingthrough = false;
            }

            for ($x=1; $x <= 10 ; $x++) {
              if(isset($_POST['departure_date'.$x.''])){
                $depyear = substr($_POST['departure_date'.$x.''], -10, -6);
                $depmonth = substr($_POST['departure_date'.$x.''], -5, -3);
                $depday = substr($_POST['departure_date'.$x.''], -2);

                $date1=date_create("".$depyear."-".$depmonth."-".$depday."");
                $date2=date_create("".$today['year']."-".$today['mon']."-".$today['mday']."");
                $todayAndDeparture=date_diff($date2,$date1);
                $departurechecksign = $todayAndDeparture->format("%R");
                $departurecheckdays = $todayAndDeparture->format("%a");
                if($departurechecksign == "-" || $departurecheckdays >=365){
                  $goingthrough = false;
                }

              }
            }


            if($departyear >= $today['year']){

            }else{
              $goingthrough = false;
            }

            if($departmonth >= $today['mon']){

            }else{
              $goingthrough = false;
            }

            if($departday >= $today['mday']){

            }else{
              if($departmonth >= $today['mon']){

              }else{
              $goingthrough = false;
              }
            }


            if($goingthrough){
              if(isset($_POST['filter']) && $_POST['filter'] !=""){
                $_SESSION['filter'] = $_POST['filter'];

              }
              multicity();


            }

          }
?>

        </body>
        </html>
