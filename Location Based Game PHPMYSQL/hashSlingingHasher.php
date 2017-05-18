<?php

function hashThis(){
	
	$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'0123456789!');
				 
	shuffle($seed); 
	$rand = '';
	
	foreach (array_rand($seed, 10) as $k) $rand .= $seed[$k];
	
	return $rand;

}




?>