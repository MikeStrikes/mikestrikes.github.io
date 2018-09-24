<?php
$goingthrough = false;



$airline = array(
  array(

    "code"=> "AC",
    "name"=> "Air Canada"

  )
);
$flights = array(
  array(
    "airline"=> "AC",
    "number"=> "301",
    "departure_airport"=> "YUL",
    "departure_time"=> "07:35",
    "arrival_airport"=> "YVR",
    "arrival_time"=> "10:05",
    "price"=> "273.23"

  ),
  array(
    "airline"=> "AC",
    "number"=> "302",
    "departure_airport"=> "YVR",
    "departure_time"=> "11:30",
    "arrival_airport"=> "YUL",
    "arrival_time"=> "19:11",
    "price"=> "220.63"



  ),
  array(
    "airline"=> "AC",
    "number"=> "317",
    "departure_airport"=> "YUL",
    "departure_time"=> "6:50",
    "arrival_airport"=> "YVR",
    "arrival_time"=> "9:28",
    "price"=> "230.63")
  );
  $airports = array(
    array(
      "code"=> "YUL",
      "city_code"=> "YMQ",
      "name"=> "Pierre Elliott Trudeau International",
      "city"=> "Montreal",
      "country_code"=> "CA",
      "region_code"=> "QC",
      "latitude"=> 45.457714,
      "longitude"=> -73.749908,
      "timezone"=> "America/Montreal"

    ),
    array(
      "code"=> "YVR",
      "city_code"=> "YVR",
      "name"=> "Vancouver International",
      "city"=> "Vancouver",
      "country_code"=> "CA",
      "region_code"=> "BC",
      "latitude"=> 49.194698,
      "longitude"=> -123.179192,
      "timezone"=> "America/Vancouver"

    )
  );
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
    $( function() {
      $( "#datepicker" ).datepicker();
    } );
    $( function() {
      $( "#datepicker2" ).datepicker();
    } );
    </script>
  </head>
  <body style="background:#e8e8e8;">



    <?php





    ?>
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
          <text class="radio-buttons">Round-trip<text><input type="radio" id = "yescheck" name="trip" value="round-trip"  onclick="javascript:yesnoCheck();" checked = "checked">
            <text class="radio-buttons">One-way<text><input type="radio" name="trip" id = "nocheck" value="one-way" onclick="javascript:yesnoCheck();">

              <p style="float:left; margin-bottom:0px;">Departure Date: <input type="date" style="width:25%;" name = "departure_date" id="datepicker"> <text id = "returndate">Return Date: <input name = "return_date" style="width:25%;"type="date" id="datepicker2"> </text></p>

              <label for="job">FROM:</label>
              <select id="from" name="departure">
                <option value="YUL">Montreal, YUL</option>
                <option value="YVR">Vancouver, YVR</option>
              </select>
              <label for="job">TO:</label>
              <select id="to" name="destination">

                <option value="YUL">Montreal, YUL</option>
                <option value="YVR">Vancouver, YVR</option>
              </select>



            </fieldset>

            <input type="submit" name = "submit" value="submit" />
          </form>
        </div>
        <h1 id = "demo"></h1>

        <script>

        function yesnoCheck() {
          if (document.getElementById('nocheck').checked) {
            document.getElementById('returndate').style.visibility = 'hidden';

          }else{
            document.getElementById('returndate').style.visibility = 'visible';

          }


        }

        </script>













        <?php
        if(isset($_POST['submit']) && $_POST['departure_date'] != "" && $_POST['departure_date'] != $_POST['return_date'] && $_POST['departure'] !=  $_POST['destination'] && $_POST['trip'] == "round-trip" && $_POST['return_date'] != ""){
          $goingthrough = true;
          $today = getdate();
          var_dump($_POST['departure_date']);

          $departyear = substr($_POST['departure_date'], -10, -6);
          echo $departyear;
          $departmonth = substr($_POST['departure_date'], -5, -3);
          echo $departmonth;
          $departday = substr($_POST['departure_date'], -2);
          echo $departday;
          $returnyear = substr($_POST['return_date'], -10, -6);
          echo "<br>". $returnyear;
          $returnmonth = substr($_POST['return_date'], -5, -3);
          echo $returnmonth;
          $returnday = substr($_POST['return_date'], -2);
          echo $returnday;

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
            $goingthrough = false;
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
            $goingthrough = false;
          }

        }

        if($goingthrough){
          $url = "available_flights.php?departure=".$_POST['departure']."&destination=".$_POST['destination']."&departure_date=".$_POST['departure_date']."&return_date=".$_POST['return_date'];
          header("Location: ".$url);
exit;
        }
        ?>

      </body>
      </html>
