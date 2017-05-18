<?php
$connect= new mysqli(getenv('IP'), getenv('C9_USER'), "", "c9", 3306);
 
if (!$connect)
{
	die('Could not connect: ' . mysql_error());
}
 
?>