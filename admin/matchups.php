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
            $('#sport').change(function(){
                //get the number of fields required from the dropdown box
                var select = $('#sport').val();
                
                if (select == 'basketball_teams')
                {
                    for (i=1;i<10;i++) {
                    $('#content').load('../includes/basketball.php');
                    }
                }
                else if (select == 'football_teams')
                {
                    $('#content').load('../includes/football.php');
                }
                else if (select == 'cricket_teams')
                {
                    $('#content').load('../includes/cricket.php');
                }
                else if (select == 'soccer_teams')
                {
                    $('#content').load('../includes/soccer.php');
                }
                else if (select == 'softball_teams')
                {
                    $('#content').load('../includes/softball.php');
                }
                else if (select == 'volleyball_teams')
                {
                    $('#content').load('../includes/volleyball.php');
                }
            });
        }); 
    </script>

<body>

<p>Select Sport
    <select id="sport" name="sport">
        <option value="0">- SELECT -</option>
        <option value="basketball_teams">Basketball</option>
        <option value="football_teams">Flag Football</option>
        <option value="cricket_teams">Cricket</option>
        <option value="soccer_teams">Soccer</option>
        <option value="softball_teams">Softball</option>
        <option value="volleyball_teams">Volleyball</option>
    </select>
</p>

<!--
<table>
	<tr>
		<td><center>HOME</center></td>
		<td><center>VS</center></td>
		<td><center>AWAY</center></td>
	</tr>
	<tr>
		<td><center>
			<select name="home">
			<?php while ($row = mysql_fetch_assoc($home)) { ?>
			<option value="<?php echo($row['team']); ?>"><?php echo($row['team']); ?></option> 
			<?php } ?>
			</select>
		</center></td>
		<td></td>
		<td><center>
			<select name="away">
			<?php while ($row = mysql_fetch_assoc($away)) { ?>
			<option value="<?php echo($row['team']); ?>"><?php echo($row['team']); ?></option> 
			<?php } ?>
			</select>
		</center></td>
	</tr>	
		
</table>
-->

<div id="content"></div>

</body>

</html>