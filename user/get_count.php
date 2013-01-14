<?php
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

	include '../includes/dbconnect.php';
    
    $sport = $_GET['sport'];
    $game_id = $_GET['matchup'];
    
    // echo $sport;
    // get new count totals, pass as JSON
	if ($sport == "cricket_scores") {
        $rs = mysql_query("SELECT * FROM $sport WHERE `game_id` = $game_id") or die('Cannot get updated click counts');

        if(mysql_num_rows($rs) >= 0) {
	    	$out = "{ ";
	    	while($row = mysql_fetch_array($rs)) {
        		$out .= "\"homeruns\": $row[homeruns], \"homeovers\": $row[homeovers], \"homewck\": $row[homewck], \"awayruns\": $row[awayruns], \"awayovers\": $row[awayovers], \"awaywck\": $row[awaywck], ";
	    	}
	    	$out = substr($out, 0, strlen($out) - 2);
	    	$out .= " }";
	    	echo($out);
	    	//header("Content-type: application/json");
	    }    
	}
    else {
        $rs = mysql_query("SELECT * FROM $sport WHERE `game_id` = $game_id") or die('Cannot get updated click counts');

        if(mysql_num_rows($rs) >= 0) {
	    	$out = "{ ";
	    	while($row = mysql_fetch_array($rs)) {
        		$out .= "\"homeq1\": $row[homeq1], \"homeq2\": $row[homeq2], \"homeot\": $row[homeot], \"homef\": $row[homef], \"awayq1\": $row[awayq1], \"awayq2\": $row[awayq2], \"awayot\": $row[awayot], \"awayf\": $row[awayf], ";
    		}
	    	$out = substr($out, 0, strlen($out) - 2);
	    	$out .= " }";
	    	echo($out);
	    	//header("Content-type: application/json");
	    }
    }
    
?>