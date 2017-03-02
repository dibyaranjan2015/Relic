<?php
session_start();
$qno=6;
include('db1.php');
$q=mysql_query("SELECT * FROM `relic` WHERE `username`='".$_SESSION['username']."'");
$r=mysql_fetch_assoc($q);
$a = mysql_query("SELECT * FROM `relic_answer` WHERE `id`='6'");
$a2 = mysql_fetch_assoc($a);
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1 && ($r['qno']==$qno) )
{
  //echo "<p style='color:#FFF'>entered</p>";
  if(isset($_POST['submit']) && $_POST['answer']==$a2['answer'])
  {
    $qr=mysql_query("UPDATE `relic` SET `qno`='".($qno+1)."' WHERE `username`='".$_SESSION['username']."'");
    $qry=mysql_query("UPDATE `relic_users` SET `qno`='".($qno+1)."',`path`= 0 WHERE `username`='".$_SESSION['username']."'");
	
    header("Location:question.php");
  }
  else
  { 
     if(isset($_POST['submit']) && !($_POST['answer']=="answer")){
		$error = 'Guess Sherlock!!!';
	}
    if($r['qno']<$qno)
    {
		header('Location:question.php');
	}
  
?>
<!DOCTYPE html>
<html style="height:100%">
<head>
<title>Relic Hunter | Kshitij 2017</title>
<link rel="stylesheet" type="text/css" href="styles/style.css"/>
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/jquery.form.js"></script>
<script type="text/javascript" src="scripts/scripts_home.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 <script>
$(document).ready(function(){
    $(".hint").click(function(){
        $(".s1").fadeToggle();
        $(".s2").fadeToggle("slow");
        $(".s3").fadeToggle(3000);
        $(".s4").fadeToggle();
        $(".s5").fadeToggle("slow");
        $(".s6").fadeToggle(3000);
    });
});
</script>
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
.sherlock{
  background-image: url(images/6.gif);
  background-repeat: no-repeat;
  background-size: contain;
  min-height: 425px;
  text-align: left;
  color: #fff;

}
.jumbotron{
  max-height:600px;
  min-height: 345px;
}
.h1{
  text-align: center;
}
.text{
   
  top: 50%;

}
.s1, .s2, .s3, .s4, .s5, .s6{
color:#326b9c;
display: none;
}


@font-face {
    font-family: 'sherlock';
    src: url('sherlock.ttf');
}
body {
    font-family: 'sherlock';
} 

body{
	background:rgba(0,0,0,0.8);
	position:relative;
}

#container{
	opacity:0.8;
}
h1{
	color:#fff;
}
#content{
	position:absolute;
	background:#fff;
	top:10%;
	left:10vw;
	width:80vw;
	margin:0 auto;
	
}
@font-face {
    font-family: 'sherlock';
    src: url('sherlock.ttf');
}
body {
    font-family: 'sherlock';
	
}
div.menu{
	background:#333333;
	
}	 
div.menu_item {
    color:#c8c8c8;
}	 
	 
  </style>

<style type="text/css">
#matrix { font-family:Lucida Console, Courier, Monotype; font-size:10pt; text-align:center;overflow:hidden;position:absolute; width:1350px;height:800px; padding:0px; margin:0px;}
.matrix_tab
{
width:100%;
text-align:center;
}
</style>

</head>


<body>
  <?php
include("menu.php");
?>

<?php if(isset($error)){echo '<div id="error">'.$error.'</div>';}?>
<div class="container" id='container'>
 <div class="page-header">
    <h1>Question 6</h1>      
  </div>
  <div class="row">
   <div class="col-sm-8">
  <div class="sherlock">
  <div class="text">
<div class="row" style='position:relative;top:10vh;'><br>
  <div class="col-sm-3 col-xs-3 s1">&nbsp;&nbsp;MOLLY</div>
    <div class="col-sm-3 col-xs-3 s2">JIM</div>
    <div class="col-sm-3 col-xs-3 s3">LESTRADE</div>
    <div class="col-sm-3 col-xs-3 s4">HUDSON</div>

</div>
  <br><br> <br> 
<div class="row" style='position:relative;top:15vh;left:-5vw;'>
    <div class="col-sm-4 col-xs-4 s5"></div>
    <div class="col-sm-4 col-xs-4 s5">MARY</div>
    <div class="col-sm-4 col-xs-4 s6">JEFF</div>

</div>
  



  </div>
  </div>
</div>

<div class="col-sm-4 jumbotron">

<div class="row">
<button class="btn btn-default btn-block hint">HINTS?</button><br>

</div>

<form method='post' action='qsher6.php'>
<div class="row">
 <span><input class="form-control" id="3" type="text" name='answer'></span>
    
      </div><br>

<div class="row submitButton">
      <button type="submit" value="Submit" class="btn btn-danger btn-primary btn-block" name='submit'>Submit</button>
        
      </div>
</form>	  
	  
</div>
</div>

 

    
</div>
	<?php include('floatletter.php')?>
    <div id='content'><div/>
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