<?php
session_start();

if(isset($_SESSION['username']))
{
include('db1.php');

$qr=mysql_query("SELECT * FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`=1");
$num = mysql_num_rows($qr);


      if($num==0){
	    $qry=mysql_query("INSERT INTO `relic_users`(`username`,`path`,`qno`) VALUES ('".$_SESSION['username']."','1','1')");
		header('Location:path1/case1.php');
	
     }else{
			$res=mysql_fetch_assoc($qr);
			$pos=$res['qno'];
	
    
			$file="path1/p1q1.php";
			switch($pos)
			{
			case 1:$file="path1/p1q1.php";
			break;
			case 2:$file="path1/p1q2.php";
			break;
			case 3:$file="path1/p1q3.php";
			break;
			case 4:$file="path1/p1q4.php";
			break;
			case 5:$file="path1/p1q5.php";
			break;
			case 6:$file="path1/complete_path1.php";
			break;
			}
			if($pos>6)
			{
			$file="choose.php";
			}


			header("Location:".$file);
	 }
}
else
{
header("Location:index.php");

}
?>