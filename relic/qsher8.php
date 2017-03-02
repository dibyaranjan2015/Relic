<?php
session_start();
$qno=8;
include('db1.php');
$q=mysql_query("SELECT * FROM `relic` WHERE `username`='".$_SESSION['username']."'");
$r=mysql_fetch_assoc($q);
$a = mysql_query("SELECT * FROM `relic_answer` WHERE `id`='8'");
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
    $(".s1").hover(function(){
        $(this).css("background-color", "#eef442");
        }, function(){
        $(this).css("background-color", "white");
    });
});
$(document).ready(function(){
    $(".s2").hover(function(){
        $(this).css("background-color", "#f49842");
        }, function(){
        $(this).css("background-color", "white");
    });
});
$(document).ready(function(){
    $(".s3").hover(function(){
        $(this).css("background-color", "#6ef442");
        }, function(){
        $(this).css("background-color", "white");
    });
});
$(document).ready(function(){
    $(".s4").hover(function(){
        $(this).css("background-color", "#42f495");
        }, function(){
        $(this).css("background-color", "white");
    });
});
$(document).ready(function(){
    $(".s5").hover(function(){
        $(this).css("background-color", "#42f4ce");
        }, function(){
        $(this).css("background-color", "white");
    });
});
$(document).ready(function(){
    $(".s6").hover(function(){
        $(this).css("background-color", "#221bbc");
        }, function(){
        $(this).css("background-color", "white");
    });
});
$(document).ready(function(){
    $(".s7").hover(function(){
        $(this).css("background-color", "#221bbc");
        }, function(){
        $(this).css("background-color", "white");
    });
});
$(document).ready(function(){
    $(".s8").hover(function(){
        $(this).css("background-color", "#782da3");
        }, function(){
        $(this).css("background-color", "white");
    });
});
$(document).ready(function(){
    $(".s9").hover(function(){
        $(this).css("background-color", "#a32d95");
        }, function(){
        $(this).css("background-color", "white");
    });
});
$(document).ready(function(){
    $(".s10").hover(function(){
        $(this).css("background-color", "#221bbc");
        }, function(){
        $(this).css("background-color", "white");
    });
});
$(document).ready(function(){
    $(".s11").hover(function(){
        $(this).css("background-color", "#221bbc");
        }, function(){
        $(this).css("background-color", "white");
    });
});
$(document).ready(function(){
    $(".s12").hover(function(){
        $(this).css("background-color", "#ce1414");
        }, function(){
        $(this).css("background-color", "white");
    });
});
$(document).ready(function(){
    $(".s13").hover(function(){
        $(this).css("background-color", "#e88d0d");
        }, function(){
        $(this).css("background-color", "white");
    });
});
$(document).ready(function(){
    $(".s14").hover(function(){
        $(this).css("background-color", "#18e80d");
        }, function(){
        $(this).css("background-color", "white");
    });
});
$(document).ready(function(){
    $(".s15").hover(function(){
        $(this).css("background-color", "#b1e80d");
        }, function(){
        $(this).css("background-color", "white");
    });
});
$(document).ready(function(){
    $(".s16").hover(function(){
        $(this).css("background-color", "#e80dd9");
        }, function(){
        $(this).css("background-color", "white");
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
  background-repeat: no-repeat;
  background-size: contain;
  min-height: 425px;
  text-align: center;
  vertical-align: center;
  line-height: 4.5em;

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
.s1{
  background-color: #fff;
}
.s2{
  background-color: #fff;
}
.s3{
  background-color: #fff;
}
.s4{
  background-color: #fff;
}
.s5{
  background-color: #fff;
}
.s6{
  background-color: #fff;
}
.s7{
  background-color: #fff;
}
.s8{
  background-color: #fff;
}
.s9{
  background-color: #fff;
}
.s10{
  background-color: #fff;
}
.s11{
  background-color: #fff;
}
.s12{
  background-color: #fff;
}
.s13{
  background-color: #fff;
}
.s14{
  background-color: #fff;
}
.s15{
  background-color: #fff;
}
.s16{
  background-color: #fff;
}
@font-face {
    font-family: 'sherlock';
    src: url('sherlock.ttf');
}
body {
    font-family: 'sherlock';
} 

body{
	
	position:relative;
}

#container{
	opacity:0.8;
	position:relative;
	
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
    <h1>Question 8</h1>      
  </div>
  <div class="row">
  <div class="col-sm-8" style='background:#fff;position:relative;left:-1vw;border-radius:5px;height:50vh;'>
  <div class="sherlock">
   
   <div class="row">
       <div class="col-sm-3 col-xs-3 s1">_</div>
       <div class="col-sm-3 col-xs-3 s2">S</div>
       <div class="col-sm-3 col-xs-3 s3">H</div>
       <div class="col-sm-3 col-xs-3 s4">_</div>
   </div>
   <div class="row">
       <div class="col-sm-3 col-xs-3 s5">K</div>
       <div class="col-sm-3 col-xs-3 s6">_</div>
       <div class="col-sm-3 col-xs-3 s7">_</div>
       <div class="col-sm-3 col-xs-3 s8">E</div>
   </div>
   <div class="row">
       <div class="col-sm-3 col-xs-3 s9">C</div>
       <div class="col-sm-3 col-xs-3 s10">_</div>
       <div class="col-sm-3 col-xs-3 s11">_</div>
       <div class="col-sm-3 col-xs-3 s12">R</div>
   </div>
   <div class="row">
       <div class="col-sm-3 col-xs-3 s13">_</div>
       <div class="col-sm-3 col-xs-3 s14">O</div>
       <div class="col-sm-3 col-xs-3 s15">L</div>
       <div class="col-sm-3 col-xs-3 s16">_</div>
   </div>
  </div>
</div>

<div class="col-sm-4 jumbotron">

<div class="row">
<h5>YOU KNOW IT !</h5>

</div>


<form method='post' action='qsher8.php'>
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