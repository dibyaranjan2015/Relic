<?php
session_start();

if(isset($_SESSION['username']))
{
include('db1.php');

$qr=mysql_query("SELECT * FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`=2");
$num = mysql_num_rows($qr);


      if($num==0){
	    $qry=mysql_query("INSERT INTO `relic_users`(`username`,`path`,`qno`) VALUES ('".$_SESSION['username']."','2','1')");
		header('Location:path1/case2.php');
	
     }else{
			$res=mysql_fetch_assoc($qr);
			$pos=$res['qno'];
	
    
			$file="path2/p2q1.php";
			switch($pos)
			{
			case 1:$file="path2/p2q1.php";
			break;
			case 2:$file="path2/p2q2.php";
			break;
			case 3:$file="path2/p2q3.php";
			break;
			case 4:$file="path2/p2q4.php";
			break;
			case 5:$file="path2/p2q5.php";
			break;
			case 6:$file="path2/complete_path2.php";
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