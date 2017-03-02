<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1)
{
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>CASE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../styles/style.css"/>
<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript" src="../scripts/jquery.form.js"></script>
<script type="text/javascript" src="../scripts/scripts.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>

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
  background: url(../images/path1/intro.jpg);
  background-repeat: no-repeat;
  opacity:0.99;
  min-height: 70vh;
  min-width: 80vw;
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
  padding: 10px;
  display: inline-block;
  vertical-align: middle;
  line-height: normal;
  margin-top:200px;
  text-align: center;
  color: #fff;
  background-color: #000;
  opacity: 0.5;
}

@font-face {
    font-family: 'sherlock';
    src: url('sherlock.ttf');
}
body {
	
    font-family: 'sherlock';
	
} 
.btn1{
	margin-top:2vh;
	width:50vw;
	text-align:center;
	background-color:#011400;
	border:none;
}
.btn1:hover{
	background-color:#401b0b
}
     
  </style>
</head>
<body>


<div class="container">
  <div class="page-header">
    <h1>CASE</h1>      
  </div>
  <div class="row">
  
  <div class="sherlock">
   <div id="text">
A British Emperor is supposed to visit a place in London.<br>
The meeting is kept secret from everybody. <br>
Only his wife and his close minister Mr. Harrington knows and they will be accompanying him in the visit.<br>
Harrington has a strange feeling that something wrong is about happen <br>
and so visits Sherlock and shares his thoughts.<br>
He can’t disclose any information about the visit but still expects Sherlock to help!<br>

 

   </div>
  </div>

</div>
  <form method='post' action='../path1.php'>
<div class="row submitButton">
      <button type="submit" value="Submit" class="btn btn-danger btn1">BEGIN</button>
</div>
</form>
</div>




</body>
</html>
<?php }else{
	header('Location:../question.php');
}
?>
