<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
$username=mysql_real_escape_string($_POST['username']);
$userpass=sha1(mysql_real_escape_string($_POST['pwd']));

echo $userpass."<br />";
$django = mysql_real_escape_string("pbkdf2_sha256$10000$KW3faNm4nq1G$SLbzdSGEwAqR5EGyRrfOW8ISGVNxHHbXtFW4JOpyAGM=");
echo $django."<br />";

/* Generates crypted hash the same way as Django does */
function get_hexdigest($algorithm, $salt, $raw_password) {
   if (!array_in($algorithm, array('md5', 'sha1'))) {
       return false;
   }
   return $algorithm($salt.$raw_password);
}

/* Checks if password matches the same way Django does */
function check_password($raw_password, $django_password) {
    list($algorithm, $salt, $hsh) = explode('$', $django_password);
    return get_hexdigest($algoritm, $salt, $raw_password) === $hsh;
}

$nil = check_password("ktjroot","pbkdf2_sha256$10000$KW3faNm4nq1G$SLbzdSGEwAqR5EGyRrfOW8ISGVNxHHbXtFW4JOpyAGM=");
echo $nil."<br />";
}
 ?>


 <div class="content_wrapper">
<div style="position:absolute;top:70%;left:73%"><img src="images/point.gif"/></div>
<div style="position:absolute;bottom:0%;right:0%;width:25%;height:30%;">
<form id="login_form" class="login_form" action="" method="POST">
<input class="input" style="position:absolute;top:26%;left:37%" type="text" name="username" id="username"/>
<input class="input" style="position:absolute;top:52%;left:37%" type="password" name="pwd" id="pwd"/>
<input  type="submit" class="submit_btn" style="position:absolute;top:72%;left:20%" name="submit" value="Login"></input>
<a href="http://www.ktj.in#reg"><input style="position:absolute;top:72%;left:45%;width:20%" type="register" class="submit_btn" href="www.ktj.in" value="Register"/><a>

</form>
</div>