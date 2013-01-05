<?php
    
    include '../includes/dbconnect.php';
    
    $sport = $_GET['sport'];
    $game_id = $_GET['matchup'];
    $qrt = $_GET['qrt'];
    
    mysql_query("UPDATE $sport SET $qrt = $qrt + 1 WHERE `game_id` = $game_id");
    $result = mysql_query("SELECT * FROM $sport WHERE `game_id` = $game_id");
    $result = mysql_fetch_array($result);
    $homef = $result['homeq1'] + $result['homeq2'] + $result['homeot'];
    $awayf = $result['awayq1'] + $result['awayq2'] + $result['awayot'];
    
    mysql_query("UPDATE $sport SET `homef` = $homef WHERE `game_id` = $game_id");
    mysql_query("UPDATE $sport SET `awayf` = $awayf WHERE `game_id` = $game_id");
    
    
    /*
		How To Increment A Counter In MySQL Based On A Radio Button Click 
		Copyright (C) 2012 Doug Vanderweide

		This program is free software: you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation, either version 3 of the License, or
		(at your option) any later version.

		This program is distributed in the hope that it will be useful,
		but WITHOUT ANY WARRANTY; without even the implied warranty of
		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
		GNU General Public License for more details.

		You should have received a copy of the GNU General Public License
		along with this program.  If not, see <http://www.gnu.org/licenses/>.
	*/
	
    /*
	$link = mysql_connect('localhost', 'ionics_nstscores', 'gjsfax') or die('Cannot connect to database server');
	mysql_select_db('ionics_nstscores') or die('Cannot select database');

	// if this is a postback ...
	if(isset($_GET['color'])) {
		// create array of acceptable values
		$ok = array('red', 'green', 'blue', 'black');
		// if we have an acceptable value for color_name ...
		if(in_array($_GET['color'], $ok)) {
			// update the counter for that color
			$q = mysql_query("UPDATE colorcounter SET colorcount = colorcount + 1 WHERE colorname = '" . $_GET['color'] . "'") or die ("Error updating count for " . $_GET['color']);
		}
	}
    */
?>