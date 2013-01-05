<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        
    	<!-- Standalone demo styles, not required by the toggles --->
	    <link rel="stylesheet" href="../css/demo.css">
	
    	<!-- Toggle Switch -->
    	<link rel="stylesheet" href="../css/toggle-switch.css">

        <link rel="stylesheet" type="text/css" href="../css/style1.css" />
    
        <link rel="stylesheet" href="../css/button.css"> 
		
        <link rel="stylesheet" href="../css/button.css">
        
        <link rel="stylesheet" href="../js/messi.css">
        
        <title>NST Scores Updater</title>
        
    <link rel="stylesheet"  href="http://jquerymobile.com/demos/1.2.0/css/themes/default/jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="http://jquerymobile.com/demos/1.2.0/docs/_assets/css/jqm-docs.css"/>
    

	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://jquerymobile.com/demos/1.2.0/docs/_assets/js/jqm-docs.js"></script>
	<script src="http://jquerymobile.com/demos/1.2.0/js/jquery.mobile-1.2.0.js"></script>


        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
	    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/blitzer/jquery-ui.css" type="text/css" />
	    <script src="../js/jquery.easy-confirm-dialog.js"></script>
        <script src="../js/game_update.js"></script>
        <script src="../js/jquery.reveal.js"></script>-->
		<script type="text/javascript" charset="utf-8">
		$(function(){
            $("select#ctlSport").change(function(){
				$.getJSON("select_matchup.php",{id: $(this).val()}, function(j){
					var options = '<option value="0">- SELECT -</option>';
					for (var i = 0; i < j.length; i++) {
						options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
					}
					$("#ctlMatchup").html(options);
					$('#ctlMatchup option:first').attr('selected', 'selected');
				})
			})
            
            $("#end").click(function() {
            
                alert("Calling button");
                Messi.ask('This is a question with Messi. Do you like it?', function(val) { alert('Your selection: ' + val); });
                
            });
            
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
                    $('#form').html("<div id='gameupdate'></div>");
                    //.fadeIn(1500, function() {
                    //    $('#message').load('get_game.php?'+dataString)
                    //})
                    $('#gameupdate').load('get_game_1.php?'+dataString)
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
                var qrt = obj.val() + $('input[name=quarter]:checked').val();
                var qs = "qrt=" + qrt + "&matchup=" + $("input#game_id").val() + "&sport=" + $("input#sport_score").val(); // set query string value
                    
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
                var qrt = obj.val() + $('input[name=quarter]:checked').val();
                var qs = "qrt=" + qrt + "&matchup=" + $("input#game_id").val() + "&sport=" + $("input#sport_score").val(); // set query string value
                    
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
        
        function processClickEnd(obj) {
            alert($("input#un").val());
            if (confirm('Are you sure you want to finish game?'))
                alert('finish game');
            else
                alert("continue");
        }
        
		</script>

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
    <div data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">
    	<form>
			<div style="padding:10px 20px;">
			    <h4>Please type "YES" to Confirm</h4>
	            <label for="un" class="ui-hidden-accessible">Username:</label>
                <input type="text" name="user" id="un" value="" placeholder="username" data-theme="a" />

                <button type='button' name='score' id='end' value='end' class='button large red wider' onclick='processClickEnd($(this))' data-theme="b">Game Over</button>
		    	<!--<button type="submit" data-theme="b">Sign in</button>-->
			</div>
		</form>
	</div>
    <script src="../js/messi.js"></script>
	</body>
</html>