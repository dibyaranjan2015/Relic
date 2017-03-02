<?php
session_start();
$qno=4;$path=2;$prev=$qno-1;
include('../db1.php');
$q=mysql_query("SELECT * FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`='".$path."' AND `qno`='".$prev."'");
$r=mysql_num_rows($q);
$q1=mysql_query("SELECT * FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`='".$path."' AND `qno`='".$qno."'");
$r1=mysql_num_rows($q1);
$a = mysql_query("SELECT * FROM `relic_answer` WHERE `id`='19'");
$a2 = mysql_fetch_assoc($a);
$q2=mysql_query("SELECT max(`qno`) FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`='".$path."'");
$r2=mysql_num_rows($q2);
//not needed for first question
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1 && $r==0 && !($r2['qno']>$qno) && $r1==1 )
{
if(isset($_POST['submit']) && ($_POST['answer']==$a2['answer']) )
{

$qry=mysql_query("UPDATE `relic_users` SET `qno`='".($qno+1)."' WHERE `username`='".$_SESSION['username']."' AND `path`=2");
header("Location:../path2.php");
}
else
{
if(isset($_POST['submit']) && $_POST['answer']!=$a2['answer'])
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
  background-image: url(../images/path2/4.png);
  background-repeat: no-repeat;
  background-size: cover;
  min-height: 425px;
  text-align: center;
  color: #fff;
 opacity:0.8;
}
.jumbotron{
  max-height:600px;
  min-height: 420px;
}
.h1{
  text-align: center;
}
.text{
   background-color: rgba(0, 0, 0, 0.6);
 

}
.s1, .s2, .s3, .s4, .s5, .s6{

display: none;
}

@font-face {
    font-family: 'sherlock';
    src: url('sherlock.ttf');
}
body {
    font-family: 'sherlock';
} 

.modal-body {
    font-family: "Courier New", Courier, monospace;
    font-size: 1.4em;
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
    <h1>Question 4</h1>      
  </div>
  <div class="row">
  <div class="col-sm-8">
  <div class="sherlock">
  <div class="text">
  

  </div>
  </div>
</div>

<div class="col-sm-4 jumbotron">


  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">Case so far</button><br>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Theory so far</h4>
        </div>
        <div class="modal-body">
          
            The 3(Nathan, Roald and Emily) were once working on a top secret project which got shut down due to unknown reasons.
            No one really knows that such a project ever existed. Nathan is getting dangerous day by day. Explosions have started in different cities acroos the globe and Sherlock feels Nathan is behind all of them.<br>
            Affected countries so far:<br>
            __Kazakhstan<br>
            __Afghanistan<br>
            __Uzbekistan<br>
            __China<br>
            __Pakistan<br>
            __Turkmenistan<br>
             
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


<form method='post' action='p2q4.php'>
<div class="row">
 <span><input class="form-control" id="3" type="text" name='answer' placeholder='Next target'></span>
    
      </div><br>

<div class="row submitButton">
      <button type="submit" value="Submit" class="btn btn-danger btn-primary btn-block" name='submit'>Submit</button>
        
</div>
</form>
<a href='case2.php' style='background:#000;color:#fff;padding:7px;position:relative;top:3vh;left:7.5vw;text-decoration:none;'>CASE </a>
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
header("Location:../question.php");
}
?>