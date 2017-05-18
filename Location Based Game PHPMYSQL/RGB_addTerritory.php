<?php
require 'database.php';
require 'hashSlingingHasher.php';

$uName = $_POST['user'];
$startTime = time();
$lat = $_POST['lat'];
$lng = $_POST['lng'];

$hash = hashThis();

$res2 = mysqli_query($connect, "SELECT user_id FROM rgb_users WHERE username = '". $uName ."'");
$row2 = mysqli_fetch_row($res2);
$u_id = $row2[0];

$deathTime = $startTime + 86400 * 7;

$res2 = mysqli_query($connect, "SELECT COUNT(*) FROM rgb_quests ");
$row2 = mysqli_fetch_row($res2);
$quests = $row2[0];

$quest = rand(1, $quests);

$res = mysqli_query($connect, "SELECT R, G, B, R_stock, G_stock, B_stock FROM rgb_users WHERE user_id = '". $u_id ."'");
$row = mysqli_fetch_row($res);

$R_inStock = $row[3];
$G_inStock = $row[4];
$B_inStock = $row[5];

$R_player = $row[0];
$G_player = $row[1];
$B_player = $row[2];

$str1 = "UPDATE rgb_users SET R_stock = '". ($R_inStock - $R_player) ."', G_stock = '". ($G_inStock - $G_player) ."', B_stock = '". ($B_inStock - $B_player) ."' WHERE user_id = '". $u_id ."'";
mysqli_query($connect, $str1);

$str = "INSERT INTO rgb_territories (user_id, territory_hash, current_R, current_G, current_B, latitude, longitude, quest_id, death_time)
		        VALUES ('$u_id', '$hash', '$R_player', '$G_player', '$B_player', '$lat', '$lng', '$quest', '$deathTime')";
								
if(mysqli_query($connect, $str)){
	echo "true";
}
else{
	echo "false";
}

//"<br /><b>Notice</b>:  Undefined index: username in <b>D:\xampp\htdocs\addemp\RGB_addTerritory.php</b> on line <b>5</b><br />true"


?>