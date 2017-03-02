<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1)
{   
    include('db1.php');
    $q=mysql_query("SELECT * FROM `relic` WHERE `username`='".$_SESSION['username']."'");
    $r=mysql_fetch_assoc($q);
	if($r['qno'] > 0){
		header("Location:question.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Relic Hunter | Kshitij 2016</title>
<link rel="stylesheet" type="text/css" href="styles/style.css"/>
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/jquery.form.js"></script>
<script type="text/javascript" src="scripts/scripts_home.js"></script>

<script type="text/javascript">
$('document').ready(function(){
$('#content').show();
$('#content').html('<div style="padding-top:5%;text-align:center"><img style="margin:0px auto" src="images/loader.gif"/></div>');
$('#content').load('home.php');
});
</script>
<style>
	body{
		background:url('images/bac2.jpg') no-repeat;
		
	}
	div.menu{
		position:relative;
		top:-50px;
		background:rgb(183,239,254);
	}
	#content{
		position:relative;
		top:-55px;
	}
	
	.next_btn{
		position:relative;
		top:-30px;
	}
</style>

</head>

<body>
	
<!--	<embed src='images/sher.mp3' hidden='true' autostart='true' type='audio/mpeg' /> -->
<audio loop="loop" autoplay="autoplay" style='height:0;'>  
    <source src="images/sher.mp3" />  
</audio> 
<div class="content_wrapper">
<?php
include("header.php");
?>

<div class="home_wrapper">
<?php
include("menu.php");
?>

<div id="content" class="content" style="display:none">
</div>

</div>


</div>
<?php include('floatletter.php')?>
</body>

</html>
<?php
}
else
{
?>

<!DOCTYPE html>
<html class="home">
<head>
<title>Relic Hunter || Kshitij 2017</title>
<link rel="stylesheet" type="text/css" href="styles/style.css"/>
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/jquery.form.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
<bgsound src="images/sher.mp3" loop="-1">
</head>

<body class="home">

<?php
if(isset($_GET['ref']) && $_GET['ref']="invalid")
{
?>
<div class="notif">Invalid Login details. Please Login again !</div>
<?php
}
?>
<div class="content_wrapper">
<?php include("header.php"); ?>


<div style="position:absolute;top:70%;left:73%">  </div>
 <div style="position: absolute;
bottom: 5%;
right: 7%;
width: 25%;
height: 26%;
background:white;
padding:2%;
opacity:0.9;
border-radius:10px;"
>
<form id="login_form" class="login_form" action="signin.php" method="POST">

Username:</br>
<input class="input"  type="text" name="username" id="username" placeholder="Enter username" style="outline: #00FF00 dotted thin;"/></br></br>
Password:</br>
<input class="input"  type="password" name="pwd" id="pwd" placeholder="Enter password" style="outline: #00FF00 dotted thin;"/></br>
<input  type="submit" class="submit_btn" " name="submit" value="Login"></input>
<a href="http://www.ktj.in"  target='_blank'>
<input  type="button" class="submit_btn" href="www.ktj.in"  value="Register"/><a>

</form>  
</div>  


</div>
</body>

</html>

<?php
}
?>