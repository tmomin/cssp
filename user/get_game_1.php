    <link rel="stylesheet"  href="http://jquerymobile.com/demos/1.2.0/css/themes/default/jquery.mobile-1.2.0.css" />
    <link rel="stylesheet" href="http://jquerymobile.com/demos/1.2.0/docs/_assets/css/jqm-docs.css"/>
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
            
            if ($status == 0) {
            echo "<center>Home: " . $home . " Away: " . $away . "
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
            </table></center>
            
            <input type='hidden' value='" . $game_id . "' id='game_id' />
            <input type='hidden' value='" . $sport_match . "' id='sport_match' />
            <input type='hidden' value='" . $sport_score . "' id='sport_score' />
            
            <section>

                <center><lable>Select Quarter</lable></center></br>
                <div class='switch switch-three candy blue'>
                    <input id='qrt1' name='quarter' type='radio' value='q1' checked>
                    <label for='qrt1' onclick=''>Quarter 1</label>
    
                    <input id='qrt2' name='quarter' type='radio' value='q2'>    
	                <label for='qrt2' onclick=''>Quarter 2</label>
    
                	<input id='ot' name='quarter' type='radio' value='ot'>	
                	<label for='ot' onclick=''>Overtime</label>
    
                	<span class='slide-button'></span>
                </div>

                <div id='container_buttons' align='center'>
                    <p>
                    <button type='button' name='score' id='home' value='home' class='button large blue wide' onclick='processClickInc($(this))'>Home +</button> &nbsp; &nbsp;
                    <button type='button' name='score' id='away' value='away' class='button large green wide' onclick='processClickInc($(this))'>Away +</button>
                    </p>
                    <p>
                    <button type='button' name='score' id='home' value='home' class='button large blue wide' onclick='processClickDec($(this))'>Home -</button> &nbsp; &nbsp;
                    <button type='button' name='score' id='away' value='away' class='button large green wide' onclick='processClickDec($(this))'>Away -</button>
                    </p>
                    <p>
                    <button type='button' name='score' id='end' value='end' class='button large red wider' onclick='processClickEnd($(this))'>Game Over</button></br>
                    <a href='#popupLogin' data-rel='popup' data-position-to='window' data-role='button' data-inline='true' data-transition='pop' class='button large red wider'>Dialog</a>
                    </p>
                </div>
            </section>
                <script src='../js/messi.js'></script>";
            }
            else
            {
                "This game is no longer available";
            }
        }
		
		//close db
		mysql_close();

?>