<?php
require 'database.php';
require 'timeConvert.php';
require 'haversine.php';

$lat = $_GET['lat'];
$lng = $_GET['lng'];
$time = time();

$res = mysqli_query($connect, "SELECT user_id, territory_id, territory_hash, current_R, current_G, current_B, latitude, longitude, quest_id, death_time FROM rgb_territories 
								WHERE latitude < ". ($lat + 1) ." AND latitude > ". ($lat - 1) ." AND death_time > ". $time ."");


$minDistance = 0;
$array;

while ($row = mysqli_fetch_row($res)) {
	
	if($minDistance == 0 || getDistance($lat, $lng, $row[6], $row[7]) < $minDistance){
		
		$minDistance = getDistance($lat, $lng, $row[6], $row[7]);
		
		$res2 = mysqli_query($connect, "SELECT user_hash FROM rgb_users WHERE user_id = ". $row[0] ."");
		$row2 = mysqli_fetch_row($res2);
			
		$res3 = mysqli_query($connect, "SELECT reward_R, reward_G, reward_B, reward_time, quest_text FROM rgb_quests WHERE quest_id = ". $row[8] ."");
		$row3 = mysqli_fetch_row($res3);
			
		$reward = "". $row3[0] ." - ". $row3[1] ." - ". $row3[2] ." <br /> ". readableTime($row3[3]) ."";
		
		$array = array("t_id" => $row[1], "R" => $row[3], "G" => $row[4], "B" => $row[5], "o_hash" => $row2[0], "t_hash" => $row[2], "distance" => $minDistance, "timeLeft" => readableTime($row[9] - $time), "reward" => $reward, "quest_text" => $row3[4]);
	}
}

echo json_encode($array);

"<br /><b>Parse error</b>:  syntax error, unexpected 'o_hash' (T_STRING) in <b>D:\xampp\htdocs\addemp\RGB_refreshInteract.php</b> on line <b>37</b><br />"

?>



