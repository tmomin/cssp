<?php

    include '../includes/dbconnect.php';
    
    $query = "SELECT `team` FROM `basketball_teams`";

    $bsk = mysql_query($query);
    
    $query = "SELECT `team` FROM `football_teams`";
    
    $ftb = mysql_query($query);
    
    $query = "SELECT `team` FROM `cricket_teams`";
    
    $crk = mysql_query($query);
    
    $query = "SELECT `team` FROM `soccer_teams`";
    
    $soc = mysql_query($query);
    
//    $query = "SELECT `team` FROM `softball_teams`";
    
//    $sfb = mysql_query($query);
    
    $query = "SELECT `team` FROM `volleyball_teams`";
    
    $vlb = mysql_query($query);
	
	mysql_close();
	
    if(mysql_num_rows($bsk)){
        $bskjson = "[ ";
        while($row=mysql_fetch_array($bsk)){
            $bskjson .= "{ \"optionValue\" : \"$row[team]\", \"optionDisplay\" : \"$row[team]\" },";
        }
        $bskjson = substr($bskjson, 0, strlen($bskjson) - 2);
        $bskjson .= " }]";
    }
    
    if(mysql_num_rows($ftb)){
        $ftbjson = "[ ";
        while($row=mysql_fetch_array($ftb)){
            $ftbjson .= "{ \"optionValue\" : \"$row[team]\", \"optionDisplay\" : \"$row[team]\" },";
        }
        $ftbjson = substr($ftbjson, 0, strlen($ftbjson) - 2);
        $ftbjson .= " }]";
    }
   
    if(mysql_num_rows($crk)){
        $crkjson = "[ ";
        while($row=mysql_fetch_array($crk)){
            $crkjson .= "{ \"optionValue\" : \"$row[team]\", \"optionDisplay\" : \"$row[team]\" },";
        }
        $crkjson = substr($crkjson, 0, strlen($crkjson) - 2);
        $crkjson .= " }]";
    }
   
    if(mysql_num_rows($soc)){
        $socjson = "[ ";
        while($row=mysql_fetch_array($soc)){
            $socjson .= "{ \"optionValue\" : \"$row[team]\", \"optionDisplay\" : \"$row[team]\" },";
        }
        $socjson = substr($socjson, 0, strlen($socjson) - 2);
        $socjson .= " }]";
    }
/**    
    if(mysql_num_rows($sfb)){
        $sfbjson = "[ ";
        while($row=mysql_fetch_array($sfb)){
            $sfbjson .= "{ \"optionValue\" : \"$row[team]\", \"optionDisplay\" : \"$row[team]\" },";
        }
        $sfbjson = substr($sfbjson, 0, strlen($sfbjson) - 2);
        $sfbjson .= " }]";
    }
**/   
    if(mysql_num_rows($vlb)){
        $vlbjson = "[ ";
        while($row=mysql_fetch_array($vlb)){
            $vlbjson .= "{ \"optionValue\" : \"$row[team]\", \"optionDisplay\" : \"$row[team]\" },";
        }
        $vlbjson = substr($vlbjson, 0, strlen($vlbjson) - 2);
        $vlbjson .= " }]";
    }



if ($_GET['id'] == 'basketball') {
  echo $bskjson;
} else if ($_GET['id'] == 'football') {
  echo $ftbjson;
} else if ($_GET['id'] == 'cricket') {
  echo $crkjson;
} else if ($_GET['id'] == 'soccer') {
  echo $socjson;
} else if ($_GET['id'] == 'softball') {
  echo $sfbjson;
} else if ($_GET['id'] == 'volleyball') {
  echo $vlbjson;
}
?>