<?php

    //connect to db
    include '../includes/dbconnect.php';
    
        //assign variable	
		$pin = $_GET['pin'];
		$sport_match = $_GET['sport'] . "_matchups";
        $sport_score = $_GET['sport'] . "_scores";
        $game_id = $_GET['matchup'];
        
        //echo $game_id;
        
        $result = mysql_query("SELECT * FROM $sport_match WHERE `game_id` = $game_id");
        $result = mysql_fetch_array($result);
        $dbpin = $result['pin'];
        $home = $result['home'];
        $away = $result['away'];
        $status = $result['status'];
        
        $result = mysql_query("SELECT * FROM $sport_score WHERE `game_id` = $game_id");
        $result = mysql_fetch_array($result);
        $homeq1 = $result['homeq1'];
        $homeq2 = $result['homeq2'];
        $homeot = $result['homeot'];
        $homef = $result['homef'];
        $awayq1 = $result['awayq1'];
        $awayq2 = $result['awayq2'];
        $awayot = $result['awayot'];
        $awayf = $result['awayf'];
        
        //echo $dbpin;
        
        if ($pin == $dbpin) {
            
            //echo $homeq2;
            
            //echo $homeq1;
            echo "Home: " . $home . " Away: " . $away . "
                <table width='300' border='1' class='sample'>
                <tr>
                <th class='sample'>Team</th>
                <th>Q1</th>
                <th>Q2</th>
                <th>OT</th>
                <th>Final</th>
                </tr>
                <tr>
                <th>HOME</th>
                <th><label id='homeq1'>" . $homeq1 . "</label></th>
                <th><label id='homeq2'>" . $homeq2 . "</label></th>
                <th><label id='homeot'>" . $homeot . "</label></th>
                <th><label id='homef'>" . $homef . "</label></th>
                </tr>
                <tr>
                <th>AWAY</th>
                <th><label id='awayq1'>" . $awayq1 . "</label></th>
                <th><label id='awayq2'>" . $awayq2 . "</label></th>
                <th><label id='awayot'>" . $awayot . "</label></th>
                <th><label id='awayf'>" . $awayf . "</label></th>
                </tr>
            </table>
            
            <input type='hidden' value='" . $game_id . "' id='game_id' />
            <input type='hidden' value='" . $sport_match . "' id='sport_match' />
            <input type='hidden' value='" . $sport_score . "' id='sport_score' />
            
            <p>
    		  <button type='button' name='score' id='homeq1' value='homeq1' onclick='processClickInc($(this))'>Home Q1 +</button>
              <button type='button' name='score' id='homeq1' value='homeq1' onclick='processClickDec($(this))'>Home Q1 -</button>
			  <button type='button' name='score' id='awayq1' value='awayq1' onclick='processClickInc($(this))'>Away Q1 +</button>
              <button type='button' name='score' id='awayq1' value='awayq1' onclick='processClickDec($(this))'>Away Q1 -</button>
              
			</p>
            <p>
			  <button type='button' name='score' id='homeq2' value='homeq2' onclick='processClickInc($(this))'>Home Q2 +</button>
              <button type='button' name='score' id='homeq2' value='homeq2' onclick='processClickDec($(this))'>Home Q2 -</button>
			  <button type='button' name='score' id='awayq2' value='awayq2' onclick='processClickInc($(this))'>Away Q2 +</button>
              <button type='button' name='score' id='awayq2' value='awayq2' onclick='processClickDec($(this))'>Away Q2 -</button>
			</p>
            <p>
    		  <button type='button' name='score' id='homeot' value='homeot' onclick='processClickInc($(this))'>Home OT +</button>
              <button type='button' name='score' id='homeot' value='homeot' onclick='processClickDec($(this))'>Home OT -</button>
			  <button type='button' name='score' id='awayot' value='awayot' onclick='processClickInc($(this))'>Away OT +</button>
              <button type='button' name='score' id='awayot' value='awayot' onclick='processClickDec($(this))'>Away OT -</button>
			</p>";
        }
		
		//close db
		mysql_close();

?>