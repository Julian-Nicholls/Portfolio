<?php

function getDistance($latFrom, $lngFrom, $latTo, $lngTo){

$radius = 6371000;

$latFrom = deg2rad($latFrom);
$lngFrom = deg2rad($lngFrom);
$latTo = deg2rad($latTo);
$lngTo = deg2rad($lngTo);

$latDelta = $latTo - $latFrom;
$lngDelta = $lngTo - $lngFrom;

$angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lngDelta / 2), 2)));
//haversine formula 

return $angle * $radius;

}



?>