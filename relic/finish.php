<?php
session_start();
include('db1.php');
$q=mysql_query("SELECT `path`,count(*) as `count` FROM `relic_users` WHERE `username`='".$_SESSION['username']."' GROUP BY `path` ");
$paths=array();
while($r=mysql_fetch_assoc($q))
{
if($r['path']==1 && $r['count']==7)
{
$paths[]=$r['path'];
}
else if($r['count']==7)
{
$paths[]=$r['path'];
}

}

//not needed for first question
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1 && count($paths)!=0)
{
?>
<!DOCTYPE html>
<html>
<head>
<title>Relic Hunter | Kshitij 2013</title>
<link rel="stylesheet" type="text/css" href="styles/style.css"/>
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/jquery.form.js"></script>
<script type="text/javascript" src="scripts/scripts_home.js"></script>

</head>

<body>
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
<div class="menu_item" style="color:#ca171d"><a style="color:#ca171d" href="question.php"> CHOOSE PATH </a>| </div>
<div class="menu_item" style="float:right"><a href="logout.php"> LOGOUT</a></div>

</div>

<div class="leader_board" id="leader_board"></div>


<div id="content" class="content" style="display:shown">
<div style="margin-top:5%;text-align:center;">You have Reached the Destination on <?php if(count($paths)>1) echo "Paths ".implode($paths," ,"); else echo "Path ".implode($paths," ,");  ?>  . <br/>Follow another path to keep exploring .</div> 
</div>

</div>


</div>
</body>

</html>
<?php
}
else
{
header("Location:question.php");
}
?>