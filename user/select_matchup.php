<?php
    
    include '../includes/dbconnect.php';
    
    $query = "SELECT * FROM `basketball_matchups`";

    $bsk = mysql_query($query);
    
    $query = "SELECT * FROM `football_matchups`";
    
    $ftb = mysql_query($query);
    
    $query = "SELECT * FROM `cricket_matchups`";
    
    $crk = mysql_query($query);
    
    $query = "SELECT * FROM `soccer_matchups`";
    
    $soc = mysql_query($query);
    
    $query = "SELECT * FROM `softball_matchups`";
    
    $sfb = mysql_query($query);
    
    $query = "SELECT * FROM `volleyball_matchups`";
    
    $vlb = mysql_query($query);
	
	mysql_close();


if ($_GET['id'] == 'basketball') {
    if(mysql_num_rows($bsk)){
        $bskjson = "[ ";
        while($row=mysql_fetch_array($bsk)){
            $bskjson .= "{ \"optionValue\" : \"$row[game_id]\", \"optionDisplay\" : \"$row[home] vs $row[away]\" },";
        }
        $bskjson = substr($bskjson, 0, strlen($bskjson) - 2);
        $bskjson .= " }]";
    }
    echo $bskjson;
} else if ($_GET['id'] == 'football') {
    if(mysql_num_rows($ftb)){
        $ftbjson = "[ ";
        while($row=mysql_fetch_array($ftb)){
            $ftbjson .= "{ \"optionValue\" : \"$row[game_id]\", \"optionDisplay\" : \"$row[home] vs $row[away]\" },";
        }
        $ftbjson = substr($ftbjson, 0, strlen($ftbjson) - 2);
        $ftbjson .= " }]";
    }
    echo $ftbjson;
} else if ($_GET['id'] == 'cricket') {
    if(mysql_num_rows($crk)){
        $crkjson = "[ ";
        while($row=mysql_fetch_array($crk)){
            $crkjson .= "{ \"optionValue\" : \"$row[game_id]\", \"optionDisplay\" : \"$row[home] vs $row[away]\" },";
        }
        $crkjson = substr($crkjson, 0, strlen($crkjson) - 2);
        $crkjson .= " }]";
    }
    echo $crkjson;
} else if ($_GET['id'] == 'soccer') {
    if(mysql_num_rows($soc)){
        $socjson = "[ ";
        while($row=mysql_fetch_array($soc)){
            $socjson .= "{ \"optionValue\" : \"$row[game]\", \"optionDisplay\" : \"$row[game]\" },";
        }
        $socjson = substr($socjson, 0, strlen($socjson) - 2);
        $socjson .= " }]";
    }
    echo $socjson;
} else if ($_GET['id'] == 'softball') {
    if(mysql_num_rows($sfb)){
        $sfbjson = "[ ";
        while($row=mysql_fetch_array($sfb)){
            $sfbjson .= "{ \"optionValue\" : \"$row[game]\", \"optionDisplay\" : \"$row[game]\" },";
        }
        $sfbjson = substr($sfbjson, 0, strlen($sfbjson) - 2);
        $sfbjson .= " }]";
    }
    echo $sfbjson;
} else if ($_GET['id'] == 'volleyball') {
    if(mysql_num_rows($vlb)){
        $vlbjson = "[ ";
        while($row=mysql_fetch_array($vlb)){
            $vlbjson .= "{ \"optionValue\" : \"$row[game]\", \"optionDisplay\" : \"$row[game]\" },";
        }
        $vlbjson = substr($vlbjson, 0, strlen($vlbjson) - 2);
        $vlbjson .= " }]";
    }
    echo $vlbjson;
}
?>