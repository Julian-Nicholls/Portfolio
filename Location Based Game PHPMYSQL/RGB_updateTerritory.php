<?php
require 'database.php';

$uName = $_POST['user'];
$R = $_POST['R'];
$G = $_POST['G'];
$B = $_POST['B'];
$t_id = $_POST['t_id'];

if($uName == "nope"){
	
	$str = "UPDATE rgb_territories SET current_R = ". $R .", current_G = ". $G .", current_B = ". $B ." WHERE territory_id = ". $t_id ."";
	
	if(mysqli_query($connect, $str)){
		echo "true1";
	}
	else{
		echo "false1";
	}
}
else{
	$res2 = mysqli_query($connect, "SELECT user_id FROM rgb_users WHERE username = '". $uName ."'");
	$row2 = mysqli_fetch_row($res2);
	$u_id = $row2[0];
	
	$str = "UPDATE rgb_territories SET current_R = ". $R .", current_G = ". $G .", current_B = ". $B .", user_id = ". $u_id ." WHERE territory_id = ". $t_id ."";

													   
	if(mysqli_query($connect, $str)){
		echo "true2";
	}
	else{
		echo $str;
	}
}

//"UPDATE rgb_territories SET current_R = 100 									   current_G = 150									   current_B = 200 									   user_id = 2									   WHERE territory_id = 2"

?>