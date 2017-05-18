<?php
require 'database.php';
require 'timeConvert.php';

$uName = $_GET['user'];
 
$res = mysqli_query($connect, "SELECT user_id, R_stock, G_stock, B_stock, time_stock FROM rgb_users WHERE username='".$uName."'");
$rows = mysqli_fetch_row($res);
$id = $rows[0];

//gen 4 values

$R = (rand(0, 255) + $rows[1]);
$G = (rand(0, 255) + $rows[2]);
$B = (rand(0, 255) + $rows[3]);

$time = (3600 + $rows[4]);

//set in rgb_users & rgb_resource

$update = "UPDATE rgb_users SET R_stock = ". $R .", G_stock = ". $G .", B_stock = ". $B .", time_stock = ". $time ." WHERE user_id = '".$id."'";
mysqli_query($connect, $update);

$update2 = "UPDATE rgb_resource SET next_release = ". (time() + 3600) ." WHERE user_id = '".$id."'";
mysqli_query($connect, $update2);

//echo out schanges

$stuff = array('R' => $R, 'G' => $G,  'B' => $B, 'time' => readableTime($time));

echo json_encode($stuff);

?>