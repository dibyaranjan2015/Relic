<?php
if(!isset($_SESSION['username']))
{
session_start();
}
if(!isset($path))
{
$path=0;
}
include("db1.php");
$qr=mysql_query("SELECT max(`qno`) AS `qno` FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`='".$path."'");
$r=mysql_fetch_assoc($qr);
if(!$r)
{
$r['qno']=0;
}
?>
<div class="menu">
<div class="menu_item" style="max-width:300px;float:left;">Welcome <?php echo ucfirst($_SESSION['username']); ?>! <span style="color:#ca171d"></span>  </div>
<div id="home" class="menu_item"> HOME  </div>
<div class="menu_item" style="color:#fb9105"><a style="color:#fb9105; text-decoration:none;" href="question.php" >|  GAME  |</a>  </div>
<div id="rules" class="menu_item"> RULES  </div>
<div id="leader" class="menu_item"> <a href='leader.php' target='_blank' style='text-decoration:none;'>| LEADER BOARD | </a></div>
<div id="credits" class="menu_item"> CONTACT </div>

<div class="menu_item" style="float:right"><a href="logout.php" style='text-decoration:none;'> LOGOUT</a></div>

</div>

<!--<div class="leader_board" id="leader_board"> -->



</div>