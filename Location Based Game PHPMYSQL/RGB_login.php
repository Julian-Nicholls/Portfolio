<?php
require 'database.php';

$uName = $_POST['username'];
$pWord = ($_POST['password']);

$qry = "SELECT username, password FROM rgb_users WHERE username='".$uName."' AND password='".$pWord."'";
$res = mysqli_query($connect, $qry);

$num_row = mysqli_num_rows($res);
$row= mysqli_fetch_assoc($res);

if( $num_row == 1 ) {
	echo 'true';
	}
else {
	echo 'false';
}
?>