<?php
session_start();
$qno=7;
include('db1.php');
$q=mysql_query("SELECT * FROM `relic` WHERE `username`='".$_SESSION['username']."'");
$r=mysql_fetch_assoc($q);
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1 && ($r['qno']>=$qno-1) )
{
  //echo "<p style='color:#FFF'>entered</p>";
  if(isset($_POST['answer']) && $_POST['answer']=="davidjoshuapeterson")
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
<html style="height:100%">
<head>
<title>Relic Hunter | Kshitij 2016</title>
<link rel="stylesheet" type="text/css" href="styles/style.css"/>
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/jquery.form.js"></script>
<script type="text/javascript" src="scripts/scripts_home.js"></script>

<style type="text/css">
#matrix { font-family:Lucida Console, Courier, Monotype; font-size:10pt; text-align:center;overflow:hidden;position:absolute; width:1350px;height:800px; padding:0px; margin:0px;}
.matrix_tab
{
width:100%;
text-align:center;
}
</style>

</head>


<body class="q1">

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
<!-- Hint lies in one of our social platforms. -->
<img style="max-width:40%;max-height:60%;" title="Oak Tree" src="images/p0_q7.jpg"/>
<br/>
<form name="answer_form" method="POST" action="creator.php">
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
}
else
{
header("Location:question.php");
}
?>