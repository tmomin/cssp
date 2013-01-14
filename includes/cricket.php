<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <title>Cricket Scoreboards</title>

    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

</head>

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<link href='http://fonts.googleapis.com/css?family=Codystar' rel='stylesheet' type='text/css'>

<style type="text/css">

body {
	font-family: helvetica;
	font-size: 12px;
	background-color: #fff;
}

table, td
{
    border-color: #600;
}

table {
    border-width: 1px 1px 1px 1px;
	border-spacing: 0;
	border-collapse: collapse;
	border-style: solid;
}

th {
	background-color: #000;
	padding-left: 10px;
	color: #FFF;
}

.thscores {
	background-color: #555;
}

td {
	margin: 0;
    background-color: #FFC;
	padding-left: 10px;
	padding-top: 2px;
	/* IE10 Consumer Preview */ 
	background-image: -ms-linear-gradient(bottom, #FFFFFF 0%, 	#F0F0F0 100%);

	/* Mozilla Firefox */ 
	background-image: -moz-linear-gradient(bottom, #FFFFFF 0%, #F0F0F0 100%);

	/* Opera */ 
	background-image: -o-linear-gradient(bottom, #FFFFFF 0%, #F0F0F0 100%);

	/* Webkit (Safari/Chrome 10) */ 
	background-image: -webkit-gradient(linear, left bottom, left top, color-stop(0, #FFFFFF), color-stop(1, #F0F0F0));

	/* Webkit (Chrome 11+) */ 
	background-image: -webkit-linear-gradient(bottom, #FFFFFF 0%, #F0F0F0 100%);

	/* W3C Markup, IE10 Release Preview */ 
	background-image: linear-gradient(to top, #FFFFFF 0%, #F0F0F0 100%);
}

tr.scores {
	height: 30px;
}

</style>



<?php
    include 'dbconnect.php';
	include 'mobile_detect.php';
	
	$detect = new Mobile_Detect();

    $sql = "SELECT * FROM cricket_scores";
    $scores = mysql_query($sql);

    if(mysql_num_rows($scores)){
        $json = "[ ";
        while($row=mysql_fetch_array($scores)) {
            $json .= "{ \"matchup\" : \"$row[game_id]\", \"homeruns\" : $row[homeruns], \"homeovers\" : $row[homeovers], \"homewck\" : $row[homewck], \"awayruns\" : $row[awayruns], \"awayovers\" : $row[awayovers], \"awaywck\" : $row[awaywck] },";
        }

        $json = substr($json, 0, strlen($json) - 2);
        $json .= " }]";
    }

    $data = json_decode($json);
    $sql2 = "SELECT * FROM cricket_matchups";
    $matchups = mysql_query($sql2);

    if(mysql_num_rows($matchups)){
        $json2 = "[ ";
        while($row2=mysql_fetch_array($matchups)) {
            $json2 .= "{ \"game_id\" : \"$row2[game_id]\", \"home\" : \"$row2[home]\", \"away\" : \"$row2[away]\" },";
        }
        $json2 = substr($json2, 0, strlen($json2) - 2);
        $json2 .= " }]";
    }

    $data2 = json_decode($json2);
	
    mysql_close();

    $count = count($data);
    $a = 0;
    $i = 0;
    $col = 3;
    $row = 1;
    $rm = $count % $row;
	
	if ($detect->isMobile()) {
		for ($r=0; $r<$count; $r++) {
			echo "</br><center><table width=\"300\">";
            echo "<tr><th width=\"40%\" align=\"left\">Final</th><th width=\"auto\">&nbsp;</th><th width=\"auto\">&nbsp;</th><th width=\"auto\" class=\"thscores\">&nbsp;</th><th width=\"auto\" class=\"thscores\">&nbsp;</th><th width=\"15%\" class=\"thscores\">Runs</th><th width=\"15%\" class=\"thscores\">Overs</th><th width=\"15%\" class=\"thscores\">Wickets</th></tr>";
            echo "<tr class=\"scores\"><td><b>" . $data2[$a]->{'home'} . "</b></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align=\"center\">" . $data[$a]->{'homeruns'} . "</td><td align=\"center\">" . $data[$a]->{'homeovers'} . "</td><td align=\"center\">" . $data[$a]->{'homewck'} . "</td></tr>";
            echo "<tr class=\"scores\"><td><b>" . $data2[$a]->{'away'} . "</b></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align=\"center\">" . $data[$a]->{'awayruns'} . "</td><td align=\"center\">" . $data[$a]->{'awayovers'} . "</td><td align=\"center\">" . $data[$a]->{'awaywck'} . "</td></tr>";
            echo "<tr><td colspan=\"8\" align=\"center\">Game Time: 10:00am</td></tr></table></center></br>";
            $a++;
		}
	}
	else {
    echo "<table width=\"100%\" ><tr>";

    for ($c = 0; $c<$col; $c++) {
        echo "<td valign='middle' align='center'>";
        if ($a < ($count - $rm)) {
            for ($r=0; $r<$row; $r++) {
                echo "</br><table width=\"300\">";
                echo "<tr><th width=\"40%\" align=\"left\">Final</th><th width=\"auto\">&nbsp;</th><th width=\"auto\">&nbsp;</th><th width=\"auto\" class=\"thscores\">&nbsp;</th><th width=\"auto\" class=\"thscores\">&nbsp;</th><th width=\"15%\" class=\"thscores\">Runs</th><th width=\"15%\" class=\"thscores\">Overs</th><th width=\"15%\" class=\"thscores\">Wickets</th></tr>";
                echo "<tr class=\"scores\"><td><b>" . $data2[$a]->{'home'} . "</b></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align=\"center\">" . $data[$a]->{'homeruns'} . "</td><td align=\"center\">" . $data[$a]->{'homeovers'} . "</td><td align=\"center\">" . $data[$a]->{'homewck'} . "</td></tr>";
                echo "<tr class=\"scores\"><td><b>" . $data2[$a]->{'away'} . "</b></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align=\"center\">" . $data[$a]->{'awayruns'} . "</td><td align=\"center\">" . $data[$a]->{'awayovers'} . "</td><td align=\"center\">" . $data[$a]->{'awaywck'} . "</td></tr>";
                echo "<tr><td colspan=\"8\" align=\"center\">Game Time: 10:00am</td></tr></table></br>";
                $a++;
            }
        }
        else {
            for ($r=0; $r<$rm; $r++) {
                echo "</br><table width=\"300\">";
                echo "<tr><th width=\"40%\" align=\"left\">Final</th><th width=\"auto\">&nbsp;</th><th width=\"auto\">&nbsp;</th><th width=\"auto\" class=\"thscores\">&nbsp;</th><th width=\"auto\" class=\"thscores\">&nbsp;</th><th width=\"15%\" class=\"thscores\">Runs</th><th width=\"15%\" class=\"thscores\">Overs</th><th width=\"15%\" class=\"thscores\">Wickets</th></tr>";
                echo "<tr class=\"scores\"><td><b>" . $data2[$a]->{'home'} . "</b></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align=\"center\">" . $data[$a]->{'homeruns'} . "</td><td align=\"center\">" . $data[$a]->{'homeovers'} . "</td><td align=\"center\">" . $data[$a]->{'homewck'} . "</td></tr>";
                echo "<tr class=\"scores\"><td><b>" . $data2[$a]->{'away'} . "</b></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align=\"center\">" . $data[$a]->{'awayruns'} . "</td><td align=\"center\">" . $data[$a]->{'awayovers'} . "</td><td align=\"center\">" . $data[$a]->{'awaywck'} . "</td></tr>";
                echo "<tr><td colspan=\"8\" align=\"center\">Game Time: 10:00am</td></tr></table></br>";
                $a++;
            }    
        }
        echo "</td>";
    }
    echo "</table>";
	}
?>