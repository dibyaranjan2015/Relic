/*<?php
		$hostname = "localhost"; 
		$db_user = "root"; 
       // $db_password="lqsym2015~mysql2015~";
		$db_password="";
		$database = "ktj17db"; 
		$db_table = "college_rep";
		$db = mysql_pconnect($hostname, $db_user, $db_password); 
		mysql_select_db($database); 
?>*/
<?php
	/*-------------------------------------------------------------
	* This code creates the connection to the database.
	-------------------------------------------------------------*/
	mysql_pconnect("localhost","root","");
//	mysql_pconnect("localhost","root","");
	mysql_select_db("ktj17db") or die ("could not open db".mysql_error());
?>