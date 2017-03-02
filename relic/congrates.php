<?php
session_start();
$qno=4;
include('db1.php');
$q=mysql_query("SELECT * FROM `relic` WHERE `username`='".$_SESSION['username']."'");
$r=mysql_fetch_assoc($q);
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1 && ($r['qno']==$qno) )
{
  
  
 
  
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

body{
	background:url('images/congrate.jpg')  no-repeat;
	background-size:100%;
	background-color: #cccccc;
}

#congrates{

	color:#d5e1f9;
	height:10vh;
	font-size:2em;
	position:relative;
	top:30vh;
	left:35vw;
	width:40vw;
	
}
</style>

</head>


<body>

<div class="content_wrapper">
<?php
include("header.php");
?>

<div id='congrates'>
    <?php echo 'Congratulation '. ucfirst($_SESSION['username']);?>
</div>


</div>                  

<footer>
   
</footer>

</body>

</html>
<?php

}
/*else
{
header("Location:question.php");
}*/
?>