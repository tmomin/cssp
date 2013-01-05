<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>NST Set Matchups</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" ></script>
    <script type="text/javascript">
        //when the webpage has loaded do this
        $(document).ready(function() {  
            //if the value within the dropdown box has changed then run this code
            $('#num_games').change(function(){
                //get the number of fields required from the dropdown box
                var num = $('#num_games').val();
                
                var i = 0;
                var html = '';
                
                for (i=1;i<=num;i++)
                {
                    //html += 'Team ' + i + ': <input type="text" name="team-' + i + '"/><br/>';
                    html += '<select id="home' + i + '" name=home"' + i +'">';
                    html += '<option value="0">- SELECT -</option>';
                    html += '<div id="options"></div>';
                    html += '</select>&nbsp';
                    html += '<select id="away' + i + '" name=away"' + i +'">';
                    html += '<option value="0">- SELECT -</option>';
                    html += '<div id="options"></div>';
                    html += '</select></br>';
                }
                $('#matchup').html(html);
            });
        });
        
    $(function(){
        $("select#sport").change(function(){
			$.getJSON("select.php",{id: $(this).val()}, function(j){
				var options = '';
				for (var i = 0; i < j.length; i++) {
					options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
				}
				for (var i = 0; i < num; i++) {
                    $("#home"+i).html(options);
                    $("#away"+i).html(options);
				    // $('#ctlPerson option:first').attr('selected', 'selected');
				}
			})
		})			
	})
    </script>

<body>

<form name="matchups" method="post" action="test.php"> 
Number of games: &nbsp;
<input type="text" id="num_games" name="num_games" />

Select Sport
    <select id="sport" name="sport">
        <option value="0">- SELECT -</option>
        <option value="basketball_teams">Basketball</option>
        <option value="football_teams">Flag Football</option>
        <option value="cricket_teams">Cricket</option>
        <option value="soccer_teams">Soccer</option>
        <option value="softball_teams">Softball</option>
        <option value="volleyball_teams">Volleyball</option>
    </select>

<div id="matchup"></div>
<div id="options"></div>
<input type="submit" name="submit" value="Submit"/>
</form>

</body>

</html>