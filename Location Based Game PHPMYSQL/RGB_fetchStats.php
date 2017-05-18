<?php
require 'database.php';
require 'timeConvert.php';

$uName = $_GET['user'];

$res = mysqli_query($connect, "SELECT  user_id, user_hash, R, G, B, territories_record, quest_id FROM rgb_users WHERE username='".$uName."'");
$rows = mysqli_fetch_row($res);

$res2 = mysqli_query($connect, "SELECT territory_hash FROM rgb_territories WHERE user_id = '".$rows[0]."' AND death_time > '". time() ."'");
$curr_terr = mysqli_num_rows($res2);

if($curr_terr > $rows[5]){
    $rows[5] = $curr_terr;
    
    $update = "UPDATE rgb_users SET territories_record = '".$curr_terr."' WHERE user_id = '".$rows[0]."'";
     mysqli_query($connect, $update);
}

$res3 = mysqli_query($connect, "SELECT quest_text FROM rgb_quests WHERE quest_id = '".$rows[6]."'");
$rows2 = mysqli_fetch_row($res3);
$q_text = $rows2[0];

$stuff = array('user_hash' => $rows[1], 'R' => $rows[2], 'G' => $rows[3], 'B' => $rows[4], 'territories_record' => $rows[5], 'curr_terr' => $curr_terr, 'q_text' => $q_text);

echo json_encode($stuff);

?>
 
