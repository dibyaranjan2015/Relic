<?php
session_start();
$qno=1;$path=3;$prev=9;
include('../db1.php');
$q=mysql_query("SELECT * FROM `relic` WHERE `username`='".$_SESSION['username']."' AND qno='".$prev."'");
$r=mysql_num_rows($q);
$q1=mysql_query("SELECT max(`qno`) AS `max` FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND path='".$path."'");
$r1=mysql_fetch_assoc($q1);
//not needed for first question
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1 && $r==1 && !($r1['max']>$qno))
{
if(isset($_POST['answer']) && $_POST['answer']=="russia")
{
$qry=mysql_query("INSERT INTO `relic_users`(`username`,`path`,`qno`) VALUES ('".$_SESSION['username']."','".$path."','".($qno+1)."')");
header("Location:../path3.php");
}
else
{
if($r1['max']!=$qno)
{
$qry=mysql_query("INSERT INTO `relic_users`(`username`,`path`,`qno`) VALUES ('".$_SESSION['username']."','".$path."','".$qno."')");
}
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
<img src="../images/national_symbol.png" title="national_symbol" style="width:40%;margin-bottom:5%" />
<form style="padding-top:5%" name="answer_form" method="POST" action="anger.php">
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