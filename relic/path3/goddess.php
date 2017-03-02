<?php
session_start();
$qno=6;$path=3;$prev=$qno-1;
include('../db1.php');
$q=mysql_query("SELECT * FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`='".$path."' AND `qno`='".$prev."'");
$r=mysql_num_rows($q);
$q1=mysql_query("SELECT * FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`='".$path."' AND `qno`='".$qno."'");
$r1=mysql_num_rows($q1);
$q2=mysql_query("SELECT max(`qno`) AS `qno` FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`='".$path."'");
$r2=mysql_fetch_assoc($q2);

//not needed for first question
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1 && $r==1 && !($r2['qno']>$qno) && $r1==1)
{
if(isset($_POST['answer']) && $_POST['answer']=="tarene")
{
$qry=mysql_query("INSERT INTO `relic_users`(`username`,`path`,`qno`) VALUES ('".$_SESSION['username']."','".$path."','".($qno+1)."')");
header("Location:../path3.php");
}
else
{
$qry=mysql_query("INSERT INTO `relic_users`(`username`,`path`,`qno`) VALUES ('".$_SESSION['username']."','".$path."','".$qno."')");

?>
<!DOCTYPE html>
<html>
<head>
<title>Relic Hunter | Kshitij 2016</title>
<link rel="stylesheet" type="text/css" href="../styles/style.css"/>
<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript" src="../scripts/jquery.form.js"></script>
<script type="text/javascript" src="../scripts/scripts.js"></script>
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

<a href="#"><div style="position:absolute;width:5px;height:400px;top:200px;right:0px"></div></a> 

<div id="content" class="content" style="display:shown">
<div class="question" id="question1">
<!-- Read Relic Hunters’s finest details… Especially the introduction(s)! -->
<img src="../images/p3_q4.PNG" style="max-width:40%;max-height:60%;" title="" />
<form style="padding-top:5%" name="answer_form" method="POST" action="goddess.php">
<input type="text" placeholder="Answer Here" class="ans" name="answer"/><br/><br/>
<input type="submit" class="submit_btn" value="Submit" />
</form>
</div>

</div>

</div>


</div>
</body>

</html>
<?php
}
}
else
{
header("Location:../question.php");
}
?>