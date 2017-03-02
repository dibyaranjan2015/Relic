<?php
include("db1.php");
$qry=mysql_query("SELECT count(*) AS `count` FROM `relic` ");
$r=mysql_fetch_assoc($qry);
echo $r['count'];
$q1=mysql_query("SELECT count(*) AS `count`,`qno` FROM `relic` GROUP BY `qno`");
while($r1=mysql_fetch_assoc($q1))
{
echo "<br/>QNo. ".$r1['qno']." - ".$r1['count'];
}

for($i=0;$i<=4;$i++)
{
$q2=mysql_query("SELECT count(*) AS `count`,`qno` FROM `relic_users` WHERE `path`='".$i."' GROUP BY `qno` ");
echo "<br/>Path ".$i;
while($r2=mysql_fetch_assoc($q2))
{
echo "<br/>QNo. ".$r2['qno']." - ".$r2['count'];
}

}

echo '<br/>People completed a Path <br/>';

$q3=mysql_query("SELECT `relic_users`.`username`,`relic_users`.`path`,`relic_users`.`qno`,`users`.`email`,`relic_users`.`time` FROM `relic_users`,`users` WHERE (`path`=1 AND `qno`=7 AND `users`.`Username`=`relic_users`.`username`) OR (`path`!=1 AND `path`!=0 AND `qno`=6 AND `users`.`Username`=`relic_users`.`username`) ");
echo "User (username - path - qno - email - time)";
while($r3=mysql_fetch_assoc($q3))
{
echo "<br/>User ".$r3['username']." - ".$r3['path']." - ".$r3['qno']." - ".$r3['email']." - ".$r3['time'];
}
?>