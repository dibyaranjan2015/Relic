<?php
session_start();

if(isset($_SESSION['username']))
{
include('db1.php');
$qr=mysql_query("SELECT max(`qno`) as qno FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`=4");
$res=mysql_fetch_assoc($qr);
$pos=$res['qno'];
$file="path4/casualty.php";
switch($pos)
{
case 1:$file="path4/casualty.php";
break;
case 2:$file="path4/contact.php";
break;
case 3:$file="path4/daretosolve.php";
break;
case 4:$file="path4/font.php";
break;
case 5:$file="path4/here_and_there.php";
break;
case 6:$file="path4/math.php";
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