<?php
session_start();
//to be changed for final
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1)
{

include('db1.php');
$q=mysql_query("SELECT * FROM `relic` WHERE `username`='".$_SESSION['username']."'");
$r=mysql_fetch_assoc($q);
$numr =  mysql_num_rows($q);
if($numr==0){


$qno=1;

if($r['qno']<=$qno)
{
	date_default_timezone_set('Asia/Kolkata');
	$entry_time = date("Y-m-d H:i:s");
	$qr = mysql_real_escape_string(mysql_query("INSERT INTO `relic`(`username`,`qno`,`time`) VALUES ('".$_SESSION['username']."','".$qno."','".$entry_time."')"));
	$qry=mysql_real_escape_string(mysql_query("INSERT INTO `relic_users`(`username`,`path`,`qno`) VALUES ('".$_SESSION['username']."','0','".$qno."')"));

}

else
{
header('Location:question.php');
}
}

if(isset($_POST['submit']) && $_POST['a1']=="s" && $_POST['a2']=="h" && $_POST['a3']=="e" && $_POST['a4']=="r")
{
	$qno = 2;
$qr=mysql_real_escape_string(mysql_query("UPDATE `relic` SET `qno`='".($qno)."' WHERE `username`='".$_SESSION['username']."'"));

$qry=mysql_real_escape_string(mysql_query("UPDATE `relic_users` SET `qno`='".($qno)."',`path`= 0 WHERE `username`='".$_SESSION['username']."'"));

header("Location:question.php");
}else{
	if(isset($_POST['answer']) && !($_POST['a1']=="s" && $_POST['a2']=="h" && $_POST['a3']=="e" && $_POST['a4']=="r")){
		$error = 'Guess Sherlock!!!';
	}
         
}


?>
<!DOCTYPE html>
<html>
<head>
<title>Relic Hunter | Kshitij 2017</title>
<link rel="stylesheet" type="text/css" href="styles/style.css"/>
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/jquery.form.js"></script>
<script type="text/javascript" src="scripts/scripts_home.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .sherlock{
      text-align: right;
      font-size: 20px;
    }
    .sherlock1{
      text-align: left;
      font-size: 20px;
    }
    .submitButton{
    text-align:center;
}

@font-face {
    font-family: 'sherlock';
    src: url('sherlock.ttf');
}
body {
    font-family: 'sherlock';
} 
.left{
  text-align: left;
}
.right{
  text-align: right;
}
.code{
  width: 40px;
  display: inline;
  align-content: center;
  padding-left:10px;
}
.box{
  padding-left: 105px;
}
.lock{
  width: 50px;
  height: 50px;
  background-image: url("1.png");
}
#container{
	opacity:0.8;
}
#content{
	position:absolute;
	background:#fff;
	top:10%;
	left:10vw;
	width:80vw;
	margin:0 auto;
	
}
.inputs{
	width:2.5vw;
	height:2.5vw;
	padding-left:0.5vw;
	margin-left:1vw;
}
@font-face {
    font-family: 'sherlock';
    src: url('sherlock.ttf');
}
body {
    font-family: 'sherlock';
}

     
  </style>

</head>

<body>
   <?php
include("menu.php");
?>
<?php if(isset($error)){echo '<div id="error">'.$error.'</div>';}?>
<div class="container" id="container">
 <div class="page-header">
    <h1>Question 1</h1>      
  </div>
  <div class="jumbotron">
  
  <form method='post' action='greetings.php'>
    
     <div class="row">
      <div class="col-xs-6">
      <div class="sherlock">I &nbsp;&nbsp;AM </div>
      </div>
      <div class="col-xs-6">
      <div class="sherlock1">LOCKED</div>
      </div>
</div><br>
<div class="lock">

</div>
<div class="row">
<div class="col-xs-4 right">
       ______________
      </div>

      <div class="col-xs-4 box" style='position:relative;left:-3vw;text-align:center'>
            <input class="form-control code inputs" id="1" type="text" maxlength="1" name='a1'>
            <input class="form-control code inputs" id="1" type="text" maxlength="1" name='a2'>
            <input class="form-control code inputs" id="1" type="text" maxlength="1" name='a3'>
            <input class="form-control code inputs" id="1" type="text" maxlength="1" name='a4'>
        
      </div>



      <div class="col-xs-4 left">
       _____________
      </div>

      </div>
      
      <hr>
      <hr>

      <div class="row submitButton">
      <button type="submit" value="Submit" class="btn btn-danger btn-lg " name='submit'>Submit</button>
        
      </div>
    

  </form>
  
</div>



 

    
</div>
    <?php include('floatletter.php')?>
	<div id='content'><div/>
	
	  
  <script>
  
	$(".inputs").keyup(function () {
    if (this.value.length == this.maxLength) {
      var $next = $(this).next('.inputs');
      if ($next.length)
          $(this).next('.inputs').focus();
      else
          $(this).blur();
    }
});
  </script>
</body>

</html>
<?php
}
else
{
//header("Location:question.php");
}
?>