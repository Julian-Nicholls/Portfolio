<?php
require 'database.php';

$uName = $_POST['user'];
$t_id = $_POST['t_id'];

$res = mysqli_query($connect, "SELECT user_id FROM rgb_users WHERE username = '". $uName ."'");
$row = mysqli_fetch_row($res);

$u_id = $row[0];

$res2 = mysqli_query($connect, "SELECT quest_id FROM rgb_territories WHERE territory_id = '". $t_id ."'");
$row2 = mysqli_fetch_row($res2);

$q_id = $row2[0];

$str = "UPDATE rgb_users SET quest_id = ". $q_id ." WHERE user_id = ". $u_id ."";
	
if(mysqli_query($connect, $str)){
	echo "true";
}
else{
	echo "false";
}

?>



