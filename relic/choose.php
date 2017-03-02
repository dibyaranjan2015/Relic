<?php
session_start();
$qno=11;
include('db1.php');
$q=mysql_query("SELECT * FROM `relic` WHERE `username`='".$_SESSION['username']."'");
$r=mysql_fetch_assoc($q);
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1 && $r['qno']==$qno) 
{


?>
<!DOCTYPE html>
<html>
<head>
<title>Relic Hunter | Kshitij 2016</title>
<link rel="stylesheet" type="text/css" href="styles/style.css"/>
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/jquery.form.js"></script>
<script type="text/javascript" src="scripts/scripts_home.js"></script>
<style>
body{
	background-size:100vw 125vh;
}
	div.path{
		font-size:1em;
		position:relative;
		top:-5px;
	}
	div.menu{
		position:relative;
		top:-8vh;
	}
	div.content{
		position:relative;
		top:-11vh;
	}
</style>

</head>

<body>
<!-- <embed src='images/choose.mp3' hidden='true' autostart='true' type='audio/mpeg' />  -->
<audio loop="loop" autoplay="autoplay" onloadeddata="var audioPlayer = this; setTimeout(function() { audioPlayer.play(); }, 8000)">  
    <source src="images/choose.mp3" />  
</audio>

<div class="content_wrapper">
<?php
include("header.php");
?>

<div class="home_wrapper">
<div class="menu">
<div id="home" class="menu_item"> HOME | </div>
<div class="menu_item"><a href="http://www.ktj.in" target="_blank"> KSHITIJ </a> | </div>
<div id="rules" class="menu_item"> RULES | </div>
<div id="credits" class="menu_item"> CONTACT | </div>

<div class="menu_item" style="color:#ca171d"><a style="color:#ca171d" href="question.php"> GAME </a>| </div>
<div class="menu_item"><a href="leader.php" target="_blank"> LEADER BOARD</a> </div>
<div class="menu_item" style="float:right"><a href="logout.php"> LOGOUT</a></div>

</div>


<div id="content" class="content" style="text-align:center;display:shown;margin:2.5% auto">
<!--<div class="heading" style='font-size:1.8em;color:#00aabb'>Choose your case</div>
<div>
<div style="width:30%;display:inline-block;height:200px;border:1px solid #000000;cursor:pointer;box-shadow:0px 0px 10px #B8B8B8;margin-bottom:10px; margin-top:30px; margin-right:10px;" class="pathi"><a href="path1.php"><img style="width:100%;height:90%" src="images/num1.jpg"/><div class="path">ciper</div></a></div>
<div style="width:30%;display:inline-block;height:200px;border:1px solid #000000;cursor:pointer;box-shadow:0px 0px 10px #B8B8B8;" class="pathi"><a href="path2.php"><img style="width:100%;height:90%" src="images/num2.jpg"/><div class="path">Path 2</div></a></div>
</div>
<div>
<div style="width:30%;display:inline-block;height:200px;border:1px solid #000000;cursor:pointer;box-shadow:0px 0px 10px #B8B8B8;margin-right:10px;" class="pathi"><a href="path3.php"><img style="width:100%;height:90%" src="images/num3.jpg"/><div class="path">Path 3</div></a></div>
<div style="width:30%;display:inline-block;height:200px;border:1px solid #000000;cursor:pointer;box-shadow:0px 0px 10px #B8B8B8;" class="pathi"><a href="path4.php"><img style="width:100%;height:90%" src="images/num4.jpg"/><div class="path">Path 4</div></a></div>
</div> -->


 <p style='color:#00aabb;text-align:center;font-size:2em;padding-top:25vh;'>The mystery has been resolved...</br></br>It's time for holiday</p>
 <p style='color:#00aabb;text-align:center;font-size:1.2em;'>Click below for more cases</p>
 <div style="width:30%;display:inline-block;cursor:pointer;;margin-bottom:10px; margin-top:30px; margin-right:10px; " class="pathi"><a href="path1.php"><div class="path">DECIPHER</div></a></div>
 <div style="width:30%;display:inline-block;cursor:pointer;;margin-bottom:10px; margin-top:30px; margin-right:10px;margin-left:2vw; " class="pathi"><a href="path2.php"><div class="path">RESCUE</div></a></div>
</div>

</div>

</div>


</div>
</body>

</html>
<?php
}
else
{
header("Location:determine_numbers.php");
}
?>