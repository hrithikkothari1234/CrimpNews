<?php
require_once('include/config.php');

function get_weather(){

    global $weather_api_key;
    $ip = "116.73.238.64"; //$_SERVER['REMOTE_ADDR'];

    $latlong = explode(",", file_get_contents('https://ipapi.co/'.$ip.'/latlong'));
    $city = file_get_contents('https://ipapi.co/'.$ip.'/city');
    $weather = file_get_contents('http://api.openweathermap.org/data/2.5/weather?lat='
    . $latlong[0] . '&lon=' . $latlong[1] . '&appid='. $weather_api_key);

    $json = json_decode($weather);

    $climate = $json->weather[0]->main;
    $temperature = $json->main->temp;
    $city;

    echo "<div class='weather'>


    </div>";


}

 ?>
