<?php
require 'database.php';
require 'timeConvert.php';

$uName = $_GET['user'];

$res = mysqli_query($connect, "SELECT user_id FROM rgb_users WHERE username='".$uName."'");
$rows = mysqli_fetch_row($res);

$res2 = mysqli_query($connect, "SELECT next_release FROM rgb_resource WHERE user_id = '".$rows[0]."'");
$rows2 = mysqli_fetch_row($res2);

if($rows2[0] < time()){
    $stuff = array('release' => true, 'timeShort' => readableTime(time() - $rows2[0]));
}
else{
    $stuff = array('release' => false, 'timeShort' => readableTime($rows2[0] - time()));
}

echo json_encode($stuff);

?>