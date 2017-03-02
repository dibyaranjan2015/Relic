<?php
session_start();
$qno=1;$path=2;$prev=11;
include('../db1.php');
$q=mysql_query("SELECT * FROM `relic` WHERE `username`='".$_SESSION['username']."' AND qno='".$prev."'");
$r=mysql_num_rows($q);
$a = mysql_query("SELECT * FROM `relic_answer` WHERE `id`='16'");
$a2 = mysql_fetch_assoc($a);
$q1=mysql_query("SELECT max(`qno`) AS `max` FROM `relic_users` WHERE `username`='".$_SESSION['username']."' AND path='".$path."'");
$r1=mysql_fetch_assoc($q1);
//not needed for first question
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1 && $r==1 && !($r1['max']>$qno)  )
{
if(isset($_POST['submit']) && $_POST['answer']==$a2['answer'])
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
<title>Relic Hunter | Kshitij 2017</title>
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
        $(".s1").fadeToggle();
        $(".s2").fadeToggle("slow");
        $(".s3").fadeToggle(3000);
        $(".s4").fadeToggle(5000);
       
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
  background-image: url(../images/path2/1.jpg);
  background-repeat: no-repeat;
  background-size: contain;
  min-height: 425px;
  text-align: center;
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
	opacity:0.8;
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
    <h1>Question 1</h1>      
  </div>
  <div class="row">
  <div class="col-sm-8">
  <div class="sherlock">
  <div class="text">
<div class="row"><br>
  <div class="s1">The ruler of that country_</div>
</div>
<div class="row"><br>
    <div class="s2">__served once in defence forces</div>
</div>
<div class="row">
  <div class="s3">__once as an intelligence officer for the same country</div>
</div>
<div class="row">
    <div class="s4">__was born in a state located between Mediterranean Sea and the Jordan river</div>
</div>
  



  </div>
  </div>
</div>

<div class="col-sm-4 jumbotron">
<div class="row">
  Sherlock deduces letter is from a city close to a salt lake.
</div>
<div class="row">
<button class="btn btn-default btn-block hint">you need some more?</button><br>
</div>

<form method='post' action='p2q1.php'>
<div class="row">
 <span><input class="form-control" id="3" type="text" name='answer'></span>
    
      </div><br>

<div class="row submitButton">
      <button type="submit" value="Submit" class="btn btn-danger btn-primary btn-block" name='submit'>Submit</button>
        
</div>
    <a href='case2.php' style='background:#000;color:#fff;padding:7px;position:relative;top:3vh;left:8vw;text-decoration:none;'>CASE </a>
</form>
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