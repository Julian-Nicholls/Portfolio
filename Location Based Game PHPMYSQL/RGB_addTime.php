<?php
require 'database.php';

$t_id = $_POST['t_id'];

$res = mysqli_query($connect, "SELECT death_time FROM rgb_territories WHERE territory_id = ". $t_id ."");
$row = mysqli_fetch_row($res);

$currentDeathTime = $row[0];
$newDeathTime = $currentDeathTime + 3600;

$str = "UPDATE rgb_territories SET death_time = ". $newDeathTime ." WHERE territory_id = ". $t_id ."";

if(mysqli_query($connect, $str)){
	echo "true";
}
else{
	echo "false";
}

?>