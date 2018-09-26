<?php
session_start();
include 'airport_data.php';
$firstFlightHours = substr($_SESSION['fly_time_1'],0,-8);
$firstFlightMinutes = substr($_SESSION['fly_time_1'],2,-5);


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
  <script type="text/javascript">
  $(document).ready(function(){
    $("#restart").on('click', function(){

window.location.replace("index.php");
     });

  });
  </script>
</head>
<style media="screen">
.confirmation_box{

  margin: auto;
}
.inside-left{
  width:48%;
  padding-left:40px;
  margin: auto;

}
.inside-right{
  width:48%;
  float:right;
  margin: auto;
  padding-right:40px;

}
hr{
  border-top: 1px solid black;
}
.inside_left_detail{
  background: #c1c1c1;;
  padding-left: 10px;
  padding-right: 10px;
}
.arround_inside_left{
  height:200px;
  border:1px solid black;
}
.bolded{
  font-weight: bold;
}
button {
background-color: #4CAF50; /* Green */
border: none;
color: white;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
margin: 4px 2px;
cursor: pointer;
width:20%;
}
.button1 {
  background-color: white;
  color: black;
  border: 2px solid #4CAF50;
}

</style>
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
  <center><h1>Confirm Flight</h1></center>
  <div class="confirmation_box"style="height:320px;">
    <div class="inside-left" style="">
      <h2>Departing Flight</h2>
      <hr>
      <text style="font-weight:bold;font-size:20px;"><?php echo $_SESSION['departure_date']."          "; ?>               </text><text style="font-weight:bold;font-size:20px;padding-left:80px;"> <?php echo $_SESSION['departure_city']; ?>, (<?php echo $_SESSION['departure_location']; ?>) - <?php echo $_SESSION['arrival_city']; ?>, (<?php echo $_SESSION['destination']; ?>)</text>
      <div class="arround_inside_left">


        <div class="inside_left_detail">
          <span class = "bolded"><?php echo $_SESSION['departure_time_1']; ?></span>
          <span class = "bolded" style="padding-left:43%;"><?php echo $firstFlightHours."hr" ?><?php echo $firstFlightMinutes."m" ?></span><span class = "bolded" style="float:right;"><?php echo $_SESSION['arrival_time_1']; ?></span>
        </div>
        <div class="content_of_left"style="padding-top:50px;padding-left:50px;padding-right:50px;">
          <h3 style="float:left;"><?php echo $_SESSION['departure_city']; ?></h3><h3 style="float:right;"><?php echo $_SESSION['arrival_city']; ?></h3>
          <div class="">
            <center><span class = "bolded" style="font-size:16px;">Flight Cost: <?php echo $_SESSION['price_1']; ?>$</span></center>
            <hr style="margin-top:10px;">
          </div>
        </div>
      </div>
    </div>

    <center><h1>Total Cost:<?php echo $_SESSION['price_1']?>$</h1></center>

<center><button type="button" id = "restart" class = ""name="button">Restart</button></center>

</body>
  </html>
