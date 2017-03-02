<?php
session_start();

if(isset($_SESSION['username']))
{
include('db1.php');
$qr=mysql_query("SELECT max(`qno`) as qno FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`=3");
$res=mysql_fetch_assoc($qr);
$pos=$res['qno'];
$file="path3/anger.php";
switch($pos)
{
case 1:$file="path3/anger.php";
break;
case 2:$file="path3/aka_muse.php";
break;
case 3:$file="path3/fame.php";
break;
case 4:$file="path3/the.php";
break;
case 5:$file="path3/u+2212.php";
break;
case 6:$file="path3/goddess.php";
break;
}
if($pos>6)
{
$file="finish.php";
}


header("Location:".$file);

}
else
{
header("Location:index.php");
}
?>