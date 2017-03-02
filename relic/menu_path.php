<?php
if(!isset($_SESSION['username']))
{
session_start();
}
if(!isset($path))
{
$path=0;
}
include("../db1.php");
$qr=mysql_query("SELECT max(`qno`) AS `qno` FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`='".$path."'");
$r=mysql_fetch_assoc($qr);
if(!$r)
{
$r['qno']=0;
}
?>

<div class="menu" style='width:100%;background:#e4e4e2;opacity:0.8;text-align:center;color:#000;font-size:0.1em;position:relative;top:0px;left:0vw;'>
<div class="menu_item" style="max-width:300px;color:#000;float:left;">Welcome <?php echo ucfirst($_SESSION['username']); ?> !</div>
<div id="home" class="menu_item">HOME | </div>
<div class="menu_item"><a href="http://www.ktj.in" target="_blank">KSHITIJ</a> | </div>
<div id="rules" class="menu_item">RULES | </div>
<div id="credits" class="menu_item">CONTACT | </div>
<div class="menu_item" ><a href="../leader.php" target="_blank">LEADER BOARD |</a></div>
<div class="menu_item" style="color:rgb(219,77,8);"><a style="color:#ca171d;" href="../choose.php">CHOOSE PATH</a></div>
<div class="menu_item" style="float:right"><a href="../logout.php">LOGOUT</a></div>

</div>

