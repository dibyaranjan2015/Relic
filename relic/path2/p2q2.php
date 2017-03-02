<?php
session_start();
$qno=2;$path=2;$prev=$qno-1;
include('../db1.php');
$q=mysql_query("SELECT * FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`='".$path."' AND `qno`='".$prev."'");
$r=mysql_num_rows($q);
$q1=mysql_query("SELECT * FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`='".$path."' AND `qno`='".$qno."'");
$r1=mysql_num_rows($q1);
$a = mysql_query("SELECT * FROM `relic_answer` WHERE `id`='17'");
$a2 = mysql_fetch_assoc($a);
$q2=mysql_query("SELECT max(`qno`) FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND `path`='".$path."'");
$r2=mysql_num_rows($q2);
//not needed for first question
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1 && $r==0 && !($r2['qno']>$qno) && $r1==1 )
{
if(isset($_POST['answer']) && ($_POST['answer']==$a2['answer']) )
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
 <script>
 $(document).ready(function(){
    $(".hint").click(function(){
        $(".s1").fadeToggle(3000);
        $(".s2").fadeToggle(4000);
        $(".s3").fadeToggle(6000);
        $(".s4").fadeToggle(8000);
       
    });
});
</script>
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
  background-image: url(../images/path2/2.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  min-height: 425px;
  text-align: center;
  color: #fff;

}
.jumbotron{
  max-height:600px;
  min-height: 430px;
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
  <div class="col-sm-8">
  <div class="sherlock">
  <div class="text">
  <div class="row"><br>
    The anonymous sender claims to possess secrets which can unsettle political powers.
  </div>
<div class="row"><br>
  <div class="col-sm-3 s1">First name:</div> <div class="col-sm-9 s2"><small>means to give<br>Son of David had a similar name</small></div>
</div>
<div class="row"><br>
  <div class="col-sm-3 s3">Last name:</div> <div class="col-sm-9 s4"><small>Son of the servant of Mary</small></div>
</div>

  </div>
  </div>
</div>

<div class="col-sm-4 jumbotron">
<div class="row">
  Sherlock found some clues which may help figure out the name of the sender!
</div><br>
<div class="row">
<button class="btn btn-default btn-block hint">Clues</button><br>
</div>


<form method='post' action='p2q2.php'>
<div class="row">
 <span><input class="form-control" id="3" type="text" name='answer'></span>
    
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