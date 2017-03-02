<html>
	<head>
	    <title>Leader Board </title>
<style>
body{
  margin:0;
  padding:0;
   background:url('images/leader3.JPG') no-repeat;
  background-size:100% 100%;
 
}
#leader_wrapper {
    width: 30vw;
    height: 87vh;
    background: url(images/leader5.png) no-repeat;
    background-size: 100% 100%;
    margin: 0 auto;
    position: relative;
    left: 30vw;
    top: 3vh;
    padding-top: 2%;
	padding-left:1%;
	
}
.name{
font-size:1.1em;
}
table {
    border-collapse: collapse;
	margin-top:13vh;
	margin-left:2vh;
}
th, td {
    border: 1px solid #1d87be;
	padding:1vh;
	color:#2a175e;
	padding-left:2vh;
	padding-right:2vh;
}
</style>
	</head>
<body>
<div style="text-align:center;font-weight:bold;font-size:1.4em; color:#fff;">LEADER BOARD</div>
<div id="leader_wrapper">

<br/>
<br/>
<?php
include("db1.php");
//$qry=mysql_query("SELECT `username`,`qno`,count('qno') AS `count`,max(`time`) AS `time` FROM `relic_users`  GROUP BY `username` ORDER BY count DESC ,`time` ASC LIMIT 10 ;");


		$q='select username, sum(qno) AS `total`,count(username) AS `count`,max(time) AS `time`
		from relic_users
		group by username ORDER BY total DESC LIMIT 10';
$qry=mysql_query($q);	   
$i=1;
?>
<table border='1' style='position:relative;top:-25vh;left:0vw;text-align:center;'>
<tr>
  <th>RANK</th>
  <th>NAME</th>
  <th>POINTS</th>
 
</tr>
<?php
while($r=mysql_fetch_assoc($qry))
{

    echo "<tr><td>".$i."</td><td>".ucwords($r['username'])."</td><td> ".($r['total'] - $r['count'])."</td></tr><br/>";
  
$i++;
}

?>
</table>
</div>
</body>
</html>
