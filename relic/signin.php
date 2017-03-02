<?php
if($_SERVER['REQUEST_METHOD']!="POST"){
	echo "Restricted Access"; 
}
else {
	session_start();
	$_SESSION['loggedin']=0;
	$nameexists=0;
	$connect=mysql_connect("localhost", "root", "");
	//include connection file;
	$username=mysql_real_escape_string($_POST['username']);
	$userpass=mysql_real_escape_string($_POST['pwd']);
	$selection=mysql_select_db("ktj17db");
	
	if(!$selection) {
		echo "Could not select database.";
		die(mysql_error());
	}		
	else {
		$query1="SELECT username FROM auth_user WHERE username='$username'";
		$result1=mysql_query($query1) or die(mysql_error());

		if(mysql_num_rows($result1)==1){
			$row1=mysql_fetch_array($result1);
			
			if($username==$row1['username']){  
				$query2="SELECT password, first_name, email FROM auth_user WHERE username='$username'";
				$result2=mysql_query($query2);
				$row2=mysql_fetch_array($result2);
				$django_pass = $row2['password'];
				$pieces = explode('$', $django_pass);
				$iterations = $pieces[1];
				$salt = $pieces[2];
				$hash = $pieces[3];
				$raw_password = $userpass;
				
				if ($hash ==  base64_encode(pbkdf2("sha256", $raw_password, $salt, $iterations, 32, true))){
				   	$_SESSION['loggedin']=1;
					$_SESSION['username']=$username;
					$_SESSION['firstname']=$row2['first_name'];
					$_SESSION['email']=$row2['email'];
					//echo $_SESSION['username'];
					echo '<meta http-equiv="Refresh" content="0;url=index.php"/>';
				}
				else {
				    echo '<meta http-equiv="Refresh" content="0;url=index.php?ref=invalid"/>';
				}							
			}
			else {
				echo '<meta http-equiv="Refresh" content="0;url=index.php?ref=invalid"/>';
			}
		}
		else {
			echo '<meta http-equiv="Refresh" content="0;url=index.php?ref=invalid"/>';
		}

	}
}

function pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output = false)
{
    $algorithm = strtolower($algorithm);
    if(!in_array($algorithm, hash_algos(), true))
        trigger_error('PBKDF2 ERROR: Invalid hash algorithm.', E_USER_ERROR);
    if($count <= 0 || $key_length <= 0)
        trigger_error('PBKDF2 ERROR: Invalid parameters.', E_USER_ERROR);

    if (function_exists("hash_pbkdf2")) {
        // The output length is in NIBBLES (4-bits) if $raw_output is false!
        if (!$raw_output) {
            $key_length = $key_length * 2;
        }
        return hash_pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output);
    }

    $hash_length = strlen(hash($algorithm, "", true));
    $block_count = ceil($key_length / $hash_length);

    $output = "";
    for($i = 1; $i <= $block_count; $i++) {
        // $i encoded as 4 bytes, big endian.
        $last = $salt . pack("N", $i);
        // first iteration
        $last = $xorsum = hash_hmac($algorithm, $last, $password, true);
        // perform the other $count - 1 iterations
        for ($j = 1; $j < $count; $j++) {
            $xorsum ^= ($last = hash_hmac($algorithm, $last, $password, true));
        }
        $output .= $xorsum;
    }

    if($raw_output)
        return substr($output, 0, $key_length);
    else
        return bin2hex(substr($output, 0, $key_length));
}
?>