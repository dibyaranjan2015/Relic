<?php
session_start();
$qno=4;
include('db1.php');
$q=mysql_query("SELECT * FROM `relic` WHERE `username`='".$_SESSION['username']."'");
$r=mysql_fetch_assoc($q);
$a = mysql_query("SELECT * FROM `relic_answer` WHERE `id`='4'");
$a2 = mysql_fetch_assoc($a);
$numr =  mysql_num_rows($q);

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1 && ($r['qno']>=$qno-1) )
{
  if(isset($_POST['submit']) &&  $_POST['answer']==$a2['answer'])
  {
    $qr=mysql_query("UPDATE `relic` SET `qno`='".($qno+1)."' WHERE `username`='".$_SESSION['username']."'");
    //$qry=mysql_query("INSERT INTO `relic_users`(`username`,`path`,`qno`) VALUES ('".$_SESSION['username']."','0','".($qno+1)."')");
	$qry=mysql_query("UPDATE `relic_users` SET `qno`='".($qno+1)."',`path`= 0 WHERE `username`='".$_SESSION['username']."'");
    header("Location:question.php");
  }
  else
  {
    if(isset($_POST['answer']) && !($_POST['b1']=='1' && $_POST['b2']=='2' && $_POST['b3']=='3' && $_POST['b4']=='4' && $_POST['b5']=='5' && $_POST['b6']=='6')){
		$error = 'Guess Sherlock!!!';
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

@font-face {
    font-family: 'sherlock';
    src: url('sherlock.ttf');
}
body {
    font-family: 'sherlock';
} 
.text{
  align-self: center;
  padding-left: 500px;
}

.text1{
  align-self: center;
  padding-left: 450px;
  padding-right: 420px;
}

.text2{
  align-self: center;
  padding-left: 35px;
}
#container{
	opacity:0.8;
}
.error{
	color:red;
	
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
.inputs{
	width:3vw;
	height:2.5vw;
	padding-left:0.5vw;
	margin-left:6vw;
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
 <div class="container" id="container">
   <div class="page-header">
    <h1>Question 4</h1>      
  </div>
  <div class="jumbotron">
  <h3>LET'S PLAY SOME CYPHER HERE</h3>      
  <p>The game is on!!</p>

  <div class="row">
    <div class="col-sm-12 col-xs-12 text">CFAHBA</div>
   
  </div><br><br>

  <div class="row">
    <div class="col-sm-12 col-xs-12 text">ABABBC</div>
    
  </div><br><br>

  <div class="row">
    <div class="col-sm-12 col-xs-12 text">ABABBE</div>
    
  </div><br><br>

  <form method='post' action='qsher4.php'>
  <div class="row">

    <div class="col-sm-12 col-xs-12 text1">
        <input class="form-control" id="1" type="text" maxlength="6" name='answer'>
      </div>

      

     

     

  </div><br><br>
   <div class="row submitButton text2">
      <button type="submit" value="Submit" class="btn btn-danger btn-lg" name='submit'>Submit</button>
        
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
}
else
{
header("Location:question.php");
}
?>