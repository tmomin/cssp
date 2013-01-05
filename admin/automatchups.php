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
        $('#num_cat').change(function(){
            //get the number of fields required from the dropdown box
            var num = $('#num_cat').val();                  

            var i = 0; //integer variable for 'for' loop
            var html = ''; //string variable for html code for fields 
            //loop through to add the number of fields specified
            for (i=1;i<=num;i++) {
                //concatinate number of fields to a variable
                html += 'Team ' + i + ': <input type="text" name="team-' + i + '"/><br/>'; 
            }
         
            //insert this html code into the div with id catList
            $('#catList').html(html);
        });
    }); 
</script>

<?php

    include '../includes/dbconnect.php';
	
	$query = "SELECT `team` FROM `basketball_teams`";
	
	mysql_close();
	
?>

<body>

</body>

</html>