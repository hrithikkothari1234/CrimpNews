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

    $description = $json->weather[0]->description;
    $climate = $json->weather[0]->main;
    $temperature = $json->main->temp;
    $city;

    switch ($climate) {
        case 'Clear':
                $icon = "01d";
                break;
        case 'Clouds':
                $icon = "02d";
                break;
        case 'Drizzle':
                $icon = "09d";
                break;
        case 'Rain':
                $icon = "10d";
                break;
        case 'Thunderstorm':
                $icon = "11d";
                break;
        case 'Snow':
                $icon = "13d";
                break;
        default:
                $icon = "50d";
                break;
    }

    //capitalize first letter
    $description = ucfirst($description);
    // Convert K to degree celcius
    $temperature = $temperature - 273.15;

    echo
    "<div class='weather'>
        <h6> {$city} </h6>
        <hr>
        <span class='climate'> {$description} </span>
        <img src = 'http://openweathermap.org/img/wn/{$icon}@2x.png' >
        <br>
        <span class='temperature'>Temperature : {$temperature}°C </span>
    </div>";

}

 ?>
