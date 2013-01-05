<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>NST Scoreboards</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Codystar' rel='stylesheet' type='text/css'>
<style>
    body {
        font-family: 'Codystar', cursive;
        font-size: 15px;
        color: white;
    }
    h1 {
        font-family: 'Codystar', cursive;
        font-size: 48px;
    }
    .sam {
        background-color: black;
        font-family: 'Montserrat', sans-serif;
        font-size: 32px;
        color: red;
        float: center;
        width: 17%;
        height: 30px;
    }
    table.games {
    	border-collapse: collapse;
        border-color: red;
        border-style: none;
        border-width: thin;
        border-spacing: 3px;
        border-collapse: separate;
        width: 100%;
        height: 30px;
        vertical-align: top;
    }
	table.black.th {
		background-color: black;
	}
	.bg {
		background-color: black;
	}
    table.sample.th {
        color: red;
        font-size: 24px;
        font-family: 'Codystar', cursive;
        width: 100%;
    }
	p {
		font-size: 24px;
		font-family: 'Codystar', cursive;
	}
</style>

<?php

    include 'dbconnect.php';
    
    $sql = "SELECT * FROM football_scores";
    
    $scores = mysql_query($sql);
    
    //var $json; // = array();
    
    if(mysql_num_rows($scores)){
        $json = "[ ";
        while($row=mysql_fetch_array($scores)){
            $json .= "{ \"matchup\" : \"$row[game_id]\", \"homeq1\" : $row[homeq1], \"homeq2\" : $row[homeq2], \"homeot\" : $row[homeot], \"homef\" : $row[homef], \"awayq1\" : $row[awayq1], \"awayq2\" : $row[awayq2], \"awayot\" : $row[awayot], \"awayf\" : $row[awayf] },";
        }
        $json = substr($json, 0, strlen($json) - 2);
        $json .= " }]";
    }
    $data = json_decode($json);
    
    $sql2 = "SELECT * FROM football_matchups";
    
    $matchups = mysql_query($sql2);
        
    if(mysql_num_rows($matchups)){
        $json2 = "[ ";
        while($row2=mysql_fetch_array($matchups)){
            $json2 .= "{ \"game_id\" : \"$row2[game_id]\", \"home\" : \"$row2[home]\", \"away\" : \"$row2[away]\" },";
        }
        $json2 = substr($json2, 0, strlen($json2) - 2);
        $json2 .= " }]";
    }
    $data2 = json_decode($json2);
    
    //echo $data2[1]->{'\"game_id\"'};
    
    //echo $data2['1']->{'HOME'};
    
    mysql_close();
    
    // echo $json;
    // echo '<BR>';
    // echo $data[2]->{'matchup'};
    
    $count = count($data);
    // $count = 15;
?>
<?php   
    // echo "<table class=\"sample\">";
    // echo "<tr><th class=\"bg\">Team</th><th class=\"bg\">Half 1</th><th class=\"bg\">Half 2</th><th class=\"bg\">OT</th><th class=\"bg\">Final</th></tr>";
    
    /** for ($r=0; $r<5; $r++)
    {
        echo "<tr>";
        
        for ($c=0; $c<10; $c++)
        {
            echo "<td>" . $c . "</td>";
        }
        
        echo "</tr>";
    } */
    $a = 0;
    $i = 0;
    $col = 3;
    $row = 5;
    // echo $count;
    $rm = $count % $row;
    // if ($rm > 0)
        
    echo "<table width=\"100%\"><tr>";
    for ($c = 0; $c<$col; $c++)
    {
        echo "<td valign='top'>";
            if ($a < ($count - $rm)){
            for ($r=0; $r<$row; $r++)
            {
                echo "<table class=\"games\" width=\"auto\">";
                echo "<tr><th class=\"bg\">Team</th><th class=\"bg\">Half 1</th><th class=\"bg\">Half 2</th><th class=\"bg\">OT</th><th class=\"bg\">Final</th></tr>";
                echo "<tr><th class=\"bg\">" . $data2[$a]->{'home'} . "</td><td class=\"sam\" align=\"center\">" . $data[$a]->{'homeq1'} . "</td><td class=\"sam\" align=\"center\">" . $data[$a]->{'homeq2'} . "</td><td class=\"sam\" align=\"center\">" . $data[$a]->{'homeot'} . "</td><td class=\"sam\" align=\"center\">" . $data[$a]->{'homef'} . "</td></tr>";
                echo "<tr><th class=\"bg\">" . $data2[$a]->{'away'} . "</td><td class=\"sam\" align=\"center\">" . $data[$a]->{'awayq1'} . "</td><td class=\"sam\" align=\"center\">" . $data[$a]->{'awayq2'} . "</td><td class=\"sam\" align=\"center\">" . $data[$a]->{'awayot'} . "</td><td class=\"sam\" align=\"center\">" . $data[$a]->{'awayf'} . "</td></tr>";
                echo "</table>";
                $a++;
            }
            }
            else {
            for ($r=0; $r<$rm; $r++)
            {
                echo "<table class=\"games\">";
                echo "<tr><th class=\"bg\">Team</th><th class=\"bg\">Half 1</th><th class=\"bg\">Half 2</th><th class=\"bg\">OT</th><th class=\"bg\">Final</th></tr>";
                echo "<tr><th class=\"bg\">" . $data2[$a]->{'home'} . "</td><td class=\"sam\" align=\"center\">" . $data[$a]->{'homeq1'} . "</td><td class=\"sam\" align=\"center\">" . $data[$a]->{'homeq2'} . "</td><td class=\"sam\" align=\"center\">" . $data[$a]->{'homeot'} . "</td><td class=\"sam\" align=\"center\">" . $data[$a]->{'homef'} . "</td></tr>";
                echo "<tr><th class=\"bg\">" . $data2[$a]->{'away'} . "</td><td class=\"sam\" align=\"center\">" . $data[$a]->{'awayq1'} . "</td><td class=\"sam\" align=\"center\">" . $data[$a]->{'awayq2'} . "</td><td class=\"sam\" align=\"center\">" . $data[$a]->{'awayot'} . "</td><td class=\"sam\" align=\"center\">" . $data[$a]->{'awayf'} . "</td></tr>";
                echo "</table>";
                $a++;
            }    
            }
        echo "</td>";
    }
    echo "</table>";
    // echo "</table>";
?>