<?php
session_start();
$qno=2;$path=1;$prev=$qno-1;
include('../db1.php');
$q=mysql_query("SELECT * FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`='".$path."' AND `qno`='".$prev."'");
$r=mysql_num_rows($q);
$a = mysql_query("SELECT * FROM `relic_answer` WHERE `id`='12'");
$a2 = mysql_fetch_assoc($a);
$q1=mysql_query("SELECT * FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`='".$path."' AND `qno`='".$qno."'");
$r1=mysql_num_rows($q1);
$q2=mysql_query("SELECT max(`qno`) FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`='".$path."'");
$r2=mysql_num_rows($q2);
//not needed for first question
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1 && $r==0 && !($r2['qno']>$qno) && $r1==1 )
{
if(isset($_POST['answer']) && ($_POST['answer']==$a2['answer']) )
{

$qry=mysql_query("UPDATE `relic_users` SET `qno`='".($qno+1)."' WHERE `username`='".$_SESSION['username']."' AND `path`=1");
header("Location:../path1.php");
}
else
{
if(isset($_POST['submit']) && $_POST['answer']!="answer")
{
	$error = 'guess sherlock!!';
}


?>
<!DOCTYPE html>
<html>
<head>
<title>Relic Hunter | Kshitij 2016</title>
<link rel="stylesheet" type="text/css" href="../styles/style.css"/>
<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript" src="../scripts/jquery.form.js"></script>
<script type="text/javascript" src="../scripts/scripts.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
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
  background-image: url(../images/path1/2.jpg);
  background-repeat: no-repeat;
  background-size: contain;
  min-height: 335px;
  max-height: 500px;
  text-align: center;
  vertical-align: center;
  padding-top: 50px;

}

.sherlock1{
  background-image: url(../images/path1/2.png);
  background-repeat: no-repeat;
  background-size: contain;
  min-height: 335px;
  max-height: 500px;
  text-align: center;
  vertical-align: center;
  padding-top: 100px;

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
  line-height: 2em;
  color: #fff;
}

@font-face {
    font-family: 'sherlock';
    src: url('sherlock.ttf');
}
body {
    font-family: 'sherlock';
} 

h4{
  font-family: "Times New Roman";
}
.roman {
   display: inline;
   text-decoration: underline;
    -webkit-animation: yourmove 5s infinite; /* Chrome, Safari, Opera */
    animation: yourmove 5s infinite;
}

/* Chrome, Safari, Opera */
@-webkit-keyframes yourmove {
    from {color: black;}
    to {color: brown;}
}

/* Standard syntax */
@keyframes yourmove {
    from {color: black;}
    to {color: brown;}
}

#container{
	opacity:1;
	
}
</style>

</head>


<body>
<?php
include("../menu_path.php");
?>
<?php if(isset($error)){echo '<div id="error">'.$error.'</div>';}?>
<div class="container" id='container'>
  <div class="page-header">
    <h1>Question 2</h1>      
  </div>
  <div class="row">
  <div id='wrap'>
  <div class="col-sm-4">
  <div class="sherlock">
   
  </div>
</div>
<div class="col-sm-3">
  <div class="sherlock1">
   <div class="text">e h c a r</div>
  </div>
</div>

<div class="col-sm-5 jumbotron">

<div class="row">
<h4>Maid of the host dies that night.
<br><br> Murderer left a note!
<br>What does he want?
</h4>

</div>

<form method='post' action='p1q2.php'>
<div class="row">
 <span><input class="form-control" id="3" type="text" name='answer'></span>
    
      </div><br>

<div class="row submitButton">
      <button type="submit" value="Submit" class="btn btn-danger btn-primary btn-block" name='submit'>Submit</button>
        
</div>
</form>
<a href='case1.php' style='background:#000;color:#fff;padding:7px;position:relative;top:3vh;left:11vw;text-decoration:none;'>CASE </a>
</div>
</div>

 

    
</div>

<script type="text/javascript">
  
 $(".sherlock").on('mouseenter mouseleave',function( e ) {
  var el = $(this);
  if(!el.data("bnc")) el.effect("bounce", { direction:'up', distance:10, times:1 });
  el.data("bnc", e.type=="mouseenter" ? true : false );
});
</script>
</body>

</html>
<?php
}
}
else
{
header("Location:../question.php");
}
?>