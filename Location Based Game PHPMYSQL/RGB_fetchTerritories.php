<?php
require 'database.php';
require 'timeConvert.php';

$lat = $_GET['lat'];
$lng = $_GET['lng'];
$time = time();

$res = mysqli_query($connect, "SELECT user_id, territory_hash, current_R, current_G, current_B, latitude, longitude, death_time FROM rgb_territories 
								WHERE latitude < ". ($lat + 1) ." AND latitude > ". ($lat - 1) ." AND death_time > ". $time ."");

$territories = array();

while ($row = mysqli_fetch_row($res)) {
	
	$res2 = mysqli_query($connect, "SELECT username, user_hash FROM rgb_users WHERE user_id = ". $row[0] ."");
	$row2 = mysqli_fetch_row($res2);
	
	$timeLeft = $row[7] - $time;
	$timeLeft = readableTime($timeLeft);
	
	$territories[] = array("user" => $row2[0], "owner" => $row2[1], "hash" => $row[1], "R" => $row[2], "G" => $row[3], "B" => $row[4], "lat" => $row[5], "lng" => $row[6], "timeLeft" => $timeLeft);
}

echo json_encode($territories);
//echo json_encode($territories);

//"Warning: mysqli_fetch_row() expects parameter 1 to be mysqli_result, boolean given in /home/ubuntu/workspace/addemp/RGB_fetchTerritories.php on line 14Call Stack:    0.0005     235152   1. {main}() /home/ubuntu/workspace/addemp/RGB_fetchTerritories.php:0    0.0019     244048   2. mysqli_fetch_row() /home/ubuntu/workspace/addemp/RGB_fetchTerritories.php:14[]"

?>