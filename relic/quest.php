<?php
session_start();
//to be changed for final
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1)
{

include('db1.php');
$q=mysql_query("SELECT * FROM `relic` WHERE `username`='".$_SESSION['username']."'");
$r=mysql_fetch_assoc($q);
$qno=1;

if($r['qno']<=$qno)
{
$qr=mysql_query("UPDATE `relic` SET `qno`='".$qno."' WHERE `username`='".$_SESSION['username']."'");
$qry=mysql_query("INSERT INTO `relic_users`(`username`,`path`,`qno`) VALUES ('".$_SESSION['username']."','0','".$qno."')");
}
else
{
header('Location:question.php');
}
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

<?php
include("menu.php");
?>

<div id="content" class="content" style="display:shown">
<div class="question" id="question1">
<img style="width:60%;" usemap="#map" src="images/enter.jpg"/>
<map name="map">
<area shape="circle" coords="220,140,25" href="question1.php"/>
<area shape="circle" coords="290,140,25" href="question1.php"/>
</map>
<br/><br/><br/>
<form name="answer_form" method="POST" action="#">
<input type="text" name="answer" placeholder="Answer" class="ans" />
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
else
{
header("Location:question.php");
}
?>