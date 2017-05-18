<?php
require 'database.php';
require 'timeConvert.php';

$uName = $_GET['user'];

$res = mysqli_query($connect, "SELECT  R_stock, G_stock, B_stock, time_stock FROM rgb_users WHERE username='".$uName."'");
$rows = mysqli_fetch_row($res);

$time_stock = readableTime($rows[3]);

$stuff = array('R' => $rows[0], 'G' => $rows[1], 'B' => $rows[2], 'time_stock' => $time_stock);

echo json_encode($stuff);

?>