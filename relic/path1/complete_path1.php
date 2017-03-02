<?php
session_start();
$qno=6;$path=1;$prev=$qno-1;
include('../db1.php');
$q=mysql_query("SELECT * FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`='".$path."' AND `qno`='".$prev."'");
$r=mysql_num_rows($q);
$q1=mysql_query("SELECT * FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`='".$path."' AND `qno`='".$qno."'");
$r1=mysql_num_rows($q1);
$q2=mysql_query("SELECT max(`qno`) FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`='".$path."'");
$r2=mysql_num_rows($q2);
//not needed for first question
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1 && $r==0 && !($r2['qno']>$qno) && $r1==1)
{

?>
<!DOCTYPE html>
<html>
<head>
<title>Relic Hunter | Kshitij 2016</title>
<link rel="stylesheet" type="text/css" href="../styles/style.css"/>
<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript" src="../scripts/jquery.form.js"></script>
<script type="text/javascript" src="../scripts/scripts.js"></script>


<style>
  .comp1{
	  font-size:1.8em;
	  padding:5vh;
	  color:#fff;
  }
  .link{
	  color:#000;
  }

</style>
</head>

<body>
<div class="content_wrapper">
<?php
include("../header_path.php");
?>



<div class="home_wrapper">
<?php
include("../menu_path.php");
?>



<div id="content" class="content" style="display:shown">


<div class="comp1">
    <p>Congrarulation you have completed case 1 too..</p>
	</p>Come tomorrow at 8:00pm for next case </p>

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
header("Location:../question.php");
}
?>