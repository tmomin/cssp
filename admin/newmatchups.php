<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"

    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>

		<meta http-equiv="Content-type" content="text/html; charset=utf-8">

		<title>New Matchups</title>

		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

		<script type="text/javascript" charset="utf-8">

		$(function(){

			            

            $('#num_games').change(function(){

                //get the number of fields required from the dropdown box

                var num = $('#num_games').val();

                

                var r = 0;

                var html = '';

                

                for (r=1;r<=num;r++)

                {

                    //html += 'Team ' + i + ': <input type="text" name="team-' + i + '"/><br/>';

                    html += '<select id="home' + r + '" name=home' + r +'>';

                    html += '<option value="0">- SELECT -</option>';

                    html += '<div id="options"></div>';

                    html += '</select>&nbsp';

                    html += '<select id="away' + r + '" name=away' + r +'>';

                    html += '<option value="0">- SELECT -</option>';

                    html += '<div id="options"></div>';

                    html += '</select></br>';

                }

                $('#matchup').html(html);

            });

            

            $("select#ctlSport").change(function(){

    			$.getJSON("select.php",{id: $(this).val()}, function(j){

					var options = '';

                    

                    var num = $('#num_games').val();

                    

					for (var i = 0; i < j.length; i++) {

						options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';

					}

                    $("#ctlPerson").html(options);

					$('#ctlPerson option:first').attr('selected', 'selected');

                    

                    for (var t=1; t<=num; t++) {

                        $("#home"+t).html(options);

                        $("#away"+t).html(options);

                    }

				})

			})

            

		})

		</script>

        

    <?php

    

    //connect to db

	include '../includes/dbconnect.php';

	

	//check if form has been posted

	if(isset($_POST['submit']))

	{

		//assign variable	

		$numTeam = $_POST['num_games'];

		$sport_match = $_POST['ctlSport'] . "_matchups";

        $sport_score = $_POST['ctlSport'] . "_scores";

		$i = 1;

        // $pin = rand(1000,9999);

		$teamHome = "home" . $i;

        //echo $_POST[$teamHome];

        $teamAway = "away" . $i;

		switch ($_POST['ctlSport']) {
			case basketball:
				$pin = 2275;
				break;
			case football:
				$pin = 3668;
				break;
			case cricket:
				$pin = 2742;
				break;
			case soccer:
				$pin = 7622;
				break;
			case softball:
				$pin = 7638;
				break;
			case volleyball:
				$pin = 8655;
				break;
		}

		//loop through post data and insert into db

		while ($i <= $numTeam) {

			mysql_query("INSERT INTO $sport_match (home, away, pin)  VALUES ('" . $_POST[$teamHome] . "', '" . $_POST[$teamAway] . "', '" . $pin . "')");

            mysql_query("INSERT INTO $sport_score (game_id) VALUES (LAST_INSERT_ID())");

            //echo ("INSERT INTO $sport_match (home, away, pin)  VALUES ('" . $_POST[$teamHome] . "', '" . $_POST[$teamAway] . "', '" . $pin . "')");

            //$tmp = $_POST[$teamHome];

            //echo "test";

            //echo $tmp;

            $i++;

			$teamHome = "home" . $i;

            $teamAway = "away" . $i;

            // $pin = rand(1000,9999);

		}

		

		//close db

		mysql_close();

	};

	

    ?>

	</head>

	<body>

    <form name="matchups" method="post" action="newmatchups.php">

        Number of games:

        <input type="text" id="num_games" name="num_games" size="3"/> &nbsp;

        Select Sport:

		<select id="ctlSport" name="ctlSport">

			<option value="0">- SELECT -</option>

            <option value="basketball">Basketball</option>

            <option value="football">Flag Football</option>

            <option value="cricket">Cricket</option>

            <option value="soccer">Soccer</option>

            <option value="softball">Softball</option>

            <option value="volleyball">Volleyball</option>

		</select>

        <div id="matchup"></div>

        <input type="submit" name="submit" value="Submit"/>

    </form>

	</body>

</html>