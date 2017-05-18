<?php

function readableTime($longTime){
	
	if($longTime <= 0){
		return "00:00:00:00";
	}
	
	$days = 0;
	$hours = 0;
	$minutes = 0;
	$seconds = 0;
	
	$temp = $longTime;

	if($temp >= 86400){
		$days = floor($temp / 86400);
		$temp = $temp % (86400 * $days);
	}
	if($temp >= 3600){
		$hours = floor($temp / 3600);
		$temp = $temp % (3600 * $hours);
	}
	if($temp >= 60){
		$minutes = floor($temp / 60);
		$temp = $temp % (60 * $minutes);
	}
	if($temp >= 1){
		$seconds = floor($temp / 1);
		$temp = $temp % (1 * $seconds);
	}

	$time_stock = sprintf("%'.02d:%'.02d:%'.02d:%'.02d", $days, $hours, $minutes, $seconds);
	
	return $time_stock;

}




?>