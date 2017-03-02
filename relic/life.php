<?php
session_start();
$qno=4;
include('db1.php');
$q=mysql_query("SELECT * FROM `relic` WHERE `username`='".$_SESSION['username']."'");
$r=mysql_fetch_assoc($q);
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1 && ($r['qno']>=$qno-1) && $r['qno']==$qno )
{
if(isset($_POST['answer']) && $_POST['answer']=="zion")
{
$qr=mysql_query("UPDATE `relic` SET `qno`='".($qno+1)."' WHERE `username`='".$_SESSION['username']."'");
$qry=mysql_query("INSERT INTO `relic_users`(`username`,`path`,`qno`) VALUES ('".$_SESSION['username']."','0','".($qno+1)."')");
header("Location:question.php");
}
else
{
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



<div id="content" class="content" style="display:shown;">
<div class="question" style="padding-top:10%" id="question1">
<p>The prophecy has been revealed ,<br/>
Machines are coming and the end is near.<br/>
The one is there to save the world<br/>
Reality is not what it seems<br/>
The present is where WE LIVE.</p>
<form name="answer_form" method="POST" action="life.php">
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
header("Location:question.php");
}
?>