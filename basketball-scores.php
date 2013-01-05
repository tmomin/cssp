<!doctype html>
<head>
<title>Basketball Scores</title>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
getScores();
});
$.ajaxSetup({ cache: false }); // This part addresses an IE bug.  without it, IE will only load the first number and will never refresh
setInterval(function() {
    $('#content').load('includes/basketball.php');
}, 1000); // the "3000" here refers to the time to refresh the div.  it is in milliseconds.



</script>
<style type="text/css">
tr:nth-child(even) { background: #EEE; }
</style>

</head>
<body>

<div id="content"></div>

</body>
</html>