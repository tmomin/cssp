<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>NST Scores Updater</title>
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
        <!--<script src="../js/game_update.js"></script>-->
		<script type="text/javascript" charset="utf-8">
		$(function(){
    		$("select#ctlSport").change(function(){
				$.getJSON("select_matchup.php",{id: $(this).val()}, function(j){
					var options = '';
					for (var i = 0; i < j.length; i++) {
						options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
					}
					$("#ctlMatchup").html(options);
					$('#ctlMatchup option:first').attr('selected', 'selected');
				})
			})
            
            $(".button").click(function() {
            // validate and process form
            // first hide any error messages
            $('.error').hide();
		
	        var sport = $("select#ctlSport").val();
                if (sport == "0") {
                    //$("label#name_error").show();
                    $("select#ctlSport").focus();
                    return false;
                }
            var matchup = $("select#ctlMatchup").val();
	        	if (matchup == "0") {
                    //$("label#email_error").show();
                    $("select#ctlMatchup").focus();
                    return false;
                }
	        var pin = $("input#pin").val();
	        	if (pin === "") {
                    //$("label#phone_error").show();
                    $("input#pin").focus();
                    return false;
                }
		
	        var dataString = 'sport='+ sport + '&matchup=' + matchup + '&pin=' + pin;
	        //alert (dataString);return false;
		
	        $.ajax({
                //type: "POST",
                //url: "get_game.php",
                //data: dataString,
                success: function() {
                    $('#form').html("<div id='message'></div>");
                    //.fadeIn(1500, function() {
                    //    $('#message').load('get_game.php?'+dataString)
                    //})
                    $('#message').load('get_game.php?'+dataString)
                    //$('#message').html("<h2>Contact Form Submitted!</h2>")
                    //.append("<p>We will be in touch soon.</p>")
                    //.hide()
                    //.fadeIn(1500, function() {
                    //    $('#message').append("<img id='checkmark' src='images/check.png' />");
                    //});
                }
            });
            return false;
	        });    
		})
        
        function getTotals() {
                // function to get click counts as JSON from helper page
    			// expects get_count.php to be in same directory level
                var qs = "matchup=" + $("input#game_id").val() + "&sport=" + $("input#sport_score").val(); // set query string value
                
                //alert(qs);
                
                $.ajax({
					type: "GET",
					url: "get_count.php",
                    data: qs,
					dataType: "json",
					error: function(xhr, status, msg) {
						alert("Failed to get click counts: " + msg);
					}
				})
				.done(function(data) {
					// loop through JSON variables, assign to count labels
                    $.each(data, function(key, value) {
						var tmp = "#" + key;
                        //var tmp = key;
                        //alert(value);
						$(tmp).text(value);
					});
				});
		}
        
        function processClickInc(obj) {
                // function to increment click count via ajax
				// expects increment_count.php to be in same directory level
				//if(lastClicked = obj.val()) { // don't count clicks on currently active radio button
				//	lastClicked = obj.val(); // set currently clicked radio button to this one
					
					//var game_id = $("input#game_id").val();
                    var qs = "qrt=" + obj.val() + "&matchup=" + $("input#game_id").val() + "&sport=" + $("input#sport_score").val(); // set query string value
                    
                    //alert(qs);
					
					$.ajax({
                        type: "GET",
						url: "increment_count.php?",
						data: qs,
						error: function(xhr, status, msg) {
							alert("Failed to process click count: " + msg);
						}
					})
					.done(function() {
                        //alert("getting totals");
						getTotals(); // update totals on successful processing
                        //$("#homeq1").text("hello");
					});
				//}
		}
        
        function processClickDec(obj) {
                // function to increment click count via ajax
    			// expects increment_count.php to be in same directory level
				//if(lastClicked = obj.val()) { // don't count clicks on currently active radio button
				//	lastClicked = obj.val(); // set currently clicked radio button to this one
					
					//var game_id = $("input#game_id").val();
                    var qs = "qrt=" + obj.val() + "&matchup=" + $("input#game_id").val() + "&sport=" + $("input#sport_score").val(); // set query string value
                    
                    //alert(qs);
					
					$.ajax({
                        type: "GET",
						url: "decrement_count.php?",
						data: qs,
						error: function(xhr, status, msg) {
							alert("Failed to process click count: " + msg);
						}
					})
					.done(function() {
                        //alert("getting totals");
						getTotals(); // update totals on successful processing
                        //$("#homeq1").text("hello");
					});
				//}
		}
/*        
        function processOK() {
                // function to increment click count via ajax
    			// expects increment_count.php to be in same directory level
		    $(".form").hide();
            alert("ok");
            $("select#ctlSport").change(function(){
    			$.getJSON("get_game.php",{pin: $('#pin').val()}, function(data){
					var options = '';
                    alert(data);
					for (var i = 0; i < j.length; i++) {
						options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
					}
					$("#ctlMatchup").html(options);
					$('#ctlMatchup option:first').attr('selected', 'selected');
				})
		    })
		}
*/                
        //$(document).ready(function() {
        //    getTotals(); // get click totals on initial page load
		//});
		</script>
        
<!--
    <?php
    
    //connect to db
	include '../includes/dbconnect.php';
	
	//check if form has been posted
	if(isset($_POST['submit']))
	{
        //assign variable	
		$pin = $_POST['pin'];
		$sport_match = $_POST['ctlSport'] . "_matchups";
        $game_id = $_POST['ctlMatchup'];
        
        $result = mysql_query("SELECT `pin` FROM $sport_match WHERE `game_id` = $game_id");
        $dbpin = mysql_fetch_assoc($result);
        
        $dbpin = $dbpin['pin'];
        
        if ($pin == $dbpin) {
            echo "<table width='300' border='1' class='sample'>
                <tr>
                <th class='sample'>Team</th>
                <th>Q1</th>
                <th>Q2</th>
                <th>Final</th>
                </tr>
                <tr>
                <td>Home</td>
                <th><label id='homeq1'>0</label></th>
                <th><label id='homeq2'>0</label></th>
                <td>hf</td>
                </tr>
                <tr>
                <td>Away</td>
                <th><label id='awayq1'>0</label></th>
                <th><label id='awayq2'>0</label></th>
                <td>af</td>
                </tr>
            </table>
            
            <p>
    		  <button type='button' name='color_name' id='r_red' value='red' onclick='processClickInc($(this))'>Home Q1 +</button>
              <button type='button' name='color_name' id='r_red' value='red' onclick='processClickDec($(this))'>Home Q1 -</button>
			  <button type='button' name='color_name' id='r_blue' value='blue' onclick='processClickInc($(this))'>Away Q1 +</button>
              <button type='button' name='color_name' id='r_blue' value='blue' onclick='processClickDec($(this))'>Away Q1 -</button>
			</p>
            <p>
			  <button type='button' name='color_name' id='r_green' value='green' onclick='processClickInc($(this))'>Home Q2 +</button>
              <button type='button' name='color_name' id='r_green' value='green' onclick='processClickDec($(this))'>Home Q2 -</button>
			  <button type='button' name='color_name' id='r_black' value='black' onclick='processClickInc($(this))'>Away Q2 +</button>
              <button type='button' name='color_name' id='r_black' value='black' onclick='processClickDec($(this))'>Away Q2 -</button>
			</p>";
        }
		
		//close db
		mysql_close();
	};
	
    ?>
-->
	</head>
	<body>
    <div id="form">
    <form name="scores" method="post" action="">
        Select Sport:
		<select id="ctlSport" name="ctlSport">
			<option value="0">- SELECT -</option>
            <option value="basketball">Basketball</option>
            <option value="football">Flag Football</option>
            <option value="cricket">Cricket</option>
            <option value="soccer">Soccer</option>
            <option value="softball">Softball</option>
            <option value="volleyball">Volleyball</option>
		</select> &nbsp;
        Select Matchup:
        <select id="ctlMatchup" name="ctlMatchup">
            <option value="0">- SELECT -</option>
        </select> &nbsp;
        Pin:
        <input type="text" id="pin" name="pin" size="4"/> &nbsp;
        <input type="submit" name="submit" class="button" id="submit_btn" value="Send" />
    </form>
    </div>
	</body>
</html>