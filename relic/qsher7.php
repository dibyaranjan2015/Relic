<?php
session_start();
$qno=7;
include('db1.php');
$q=mysql_query("SELECT * FROM `relic` WHERE `username`='".$_SESSION['username']."'");
$r=mysql_fetch_assoc($q);
$a = mysql_query("SELECT * FROM `relic_answer` WHERE `id`='7'");
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
  background-image: url(images/7.png);
  background-repeat: no-repeat;
  background-size: contain;
  min-height: 425px;
  text-align: center;
  vertical-align: center;

}
.jumbotron{
  max-height: 600px;
  min-height: 345px;
}
.h1{
  text-align: center;
}
#text{
  display: inline-block;
  vertical-align: middle;
  line-height: normal;
  margin-top:200px;
  font-size: 2.5em;
  color: #fff;
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
    <h1>Question 7</h1>      
  </div>
  <div class="row">
  <div class="col-sm-8">
  <div class="sherlock">
   <div id="text">271767 780081</div>
  </div>
</div>

<div class="col-sm-4 jumbotron">

<div class="row">
<h5>FOUR LETTERS. BETRAYED.</h5>

</div>

<form method='post' action='qsher7.php'>
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
    
	
	<script type="text/javascript">
  
 $("#text").on('mouseenter mouseleave',function( e ) {
  var el = $(this);
  if(!el.data("bnc")) el.effect("bounce", { direction:'up', distance:10, times:1 });
  el.data("bnc", e.type=="mouseenter" ? true : false );
});
</script>

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