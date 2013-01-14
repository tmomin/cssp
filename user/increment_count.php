<?php
    
    include '../includes/dbconnect.php';
    
    $sport = $_GET['sport'];
    $game_id = $_GET['matchup'];
    $qrt = $_GET['qrt'];
    
    if ($sport == "cricket_scores") {
        mysql_query("UPDATE $sport SET $qrt = $qrt + 1 WHERE `game_id` = $game_id");    
    } else if ($sport == "softball_scores") {
		mysql_query("UPDATE $sport SET $qrt = $qrt + 1 WHERE `game_id` = $game_id");
	} else {
        mysql_query("UPDATE $sport SET $qrt = $qrt + 1 WHERE `game_id` = $game_id");
        $result = mysql_query("SELECT * FROM $sport WHERE `game_id` = $game_id");
        $result = mysql_fetch_array($result);
        $homef = $result['homeq1'] + $result['homeq2'] + $result['homeot'];
        $awayf = $result['awayq1'] + $result['awayq2'] + $result['awayot'];
    
        mysql_query("UPDATE $sport SET `homef` = $homef WHERE `game_id` = $game_id");
        mysql_query("UPDATE $sport SET `awayf` = $awayf WHERE `game_id` = $game_id");
    }
?>