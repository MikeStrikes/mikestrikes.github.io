<?php

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
    "departure_time"=> "06:50",
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
  $selectedFlights = array(
    array(
      "departure_code"=> "YUL",
      "arrival_code"=> "YMQ",
      "departure_time"=> "Pierre Elliott Trudeau International",
      "arrival_time"=> "Montreal",
      "flight_time"=> "CA",
      "departure_city"=> "QC",
      "arrival_city"=> 45.457714,
      "price"=> -73.749908,
      "departure_date"=> "America/Montreal"
    )
  )

 ?>
