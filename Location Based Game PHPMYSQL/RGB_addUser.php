<?php
require 'database.php';
require 'hashSlingingHasher.php';

$uName = $_POST['username'];
$pWord = ($_POST['password']);

$hash = hashThis();

$R = rand(0, 255);
$G = rand(0, 255);
$B = rand(0, 255);

$R_stock = rand(0, 255) + 100;
$G_stock = rand(0, 255) + 100;
$B_stock = rand(0, 255) + 100;

$time = 3600;

$str = "INSERT INTO rgb_users (username, password, user_hash, R, G, B, R_stock, G_stock, B_stock, territories_record, quest_id, time_stock)
		        VALUES ('$uName', '$pWord', '$hash', '$R', '$G', '$B', '$R_stock', '$G_stock', '$B_stock', 0, 0, '$time')";
		        
mysqli_query($connect, $str);

$res = mysqli_query($connect, "SELECT  user_id FROM rgb_users WHERE username='".$uName."'");
$rows = mysqli_fetch_row($res);
		   
$str2 = "INSERT INTO rgb_resource (user_id, next_release)
		        VALUES (". $rows[0] .", ". 0 .")";
				
if(mysqli_query($connect, $str2)){
	echo "true";
}
else{
	echo "false";
}


?>