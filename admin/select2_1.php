<?php

    include '../includes/dbconnect.php';
    
    $query = "SELECT `team` FROM `basketball_teams`";

	$bb = mysql_query($query);
    
    $query = "SELECT `team` FROM `football_teams`";
    
    $fb = mysql_query($query);
    
    $query = "SELECT `team` FROM `cricket_teams`";
    
    $cri = mysql_query($query);
	
	mysql_close();
	
    if(mysql_num_rows($bb)){
        $bbjson = "[ ";
        while($row=mysql_fetch_array($bb)){
            $bbjson .= "{ \"optionValue\" : \"$row[team]\", \"optionDisplay\" : \"$row[team]\" },";
        }
        $bbjson = substr($bbjson, 0, strlen($bbjson) - 2);
        $bbjson .= " }]";
    }
    
    if(mysql_num_rows($fb)){
        $fbjson = "[ ";
        while($row=mysql_fetch_array($fb)){
            $fbjson .= "{ \"optionValue\" : \"$row[team]\", \"optionDisplay\" : \"$row[team]\" },";
        }
        $fbjson = substr($fbjson, 0, strlen($fbjson) - 2);
        $fbjson .= " }]";
    }



if ($_GET['id'] == 'basketball_teams') {
  echo $bbjson;
} else if ($_GET['id'] == 'football_teams') {
  echo $fbjson;
} else if ($_GET['id'] == 'cricket_teams') {
  echo <<<HERE_DOC
    [{"optionValue":20, "optionDisplay": "Aidan"}, {"optionValue":21, "optionDisplay":"Russell"}]
HERE_DOC;
}
?>