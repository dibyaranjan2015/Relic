<?php
session_start();

if(isset($_SESSION['username']))
{
include('db1.php');
$qr=mysql_query("SELECT * FROM `relic` WHERE `username`='".$_SESSION['username']."'");
$res=mysql_fetch_assoc($qr);
$pos=$res['qno'];
$file="greetings.php";
switch($pos)
{
case 1:$file="greetings.php";
break;
case 2:$file="qsher2.php"; //address
break;
case 3:$file="qsher3.php";
break;
case 4:$file="qsher4.php";
break;
case 5:$file="qsher5.php";
break;
case 6:$file="qsher6.php";
break;
case 7:$file="qsher7.php";
break;
case 8:$file="qsher8.php";
break;
case 9:$file="qsher9.php";
break;
case 10:$file="qsher10.php";
break;
case 11:$file="choose.php";
break;
}
if($pos>10)
{
$file="choose.php";
}

header("Location:".$file);

}
else
{
header("Location:index.php");
}
?>