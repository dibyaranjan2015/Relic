<?php
session_start();
$qno=3;
include('db1.php');
$q=mysql_query("SELECT * FROM `relic` WHERE `username`='".$_SESSION['username']."'");
$r=mysql_fetch_assoc($q);
$a = mysql_query("SELECT * FROM `relic_answer` WHERE `id`='3'");
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
  background-image: url('images/3.gif');
  background-repeat: no-repeat;
  background-size: contain;
  min-height: 425px;

}
.jumbotron{
  min-height: 340px;
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
	color:#c8c8c8;
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
    <h1>Question 3</h1>      
  </div>
  <div class="row">
  <div class="col-sm-8">
  <div class="sherlock">
  </div>
</div>

<div class="col-sm-4 jumbotron">

<div class="row">
<h5>DIDN'T YOU HEAR HIM?</h5><br/>
<h6>GO, GET HIM THE </br></br>SANDWICH!</h6>
</div>

<form method='POST' action='qsher3.php'>
<div class="row">
 <span><input class="form-control" id="3" type="text" name='answer'></span>
    
      </div><br>

<div class="row submitButton">
      <button type="submit" value="Submit" class="btn btn-danger btn-primary btn-block" style='letter-spacing:1.5px;'name='submit'>Submit</button>
        
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