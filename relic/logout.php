<?php
session_start();
if(isset($_SESSION['loggedin']))
{
unset($_SESSION);
session_destroy();
echo '<meta HTTP-EQUIV="Refresh" content="0;url=index.php">';
}
else
{
echo '<meta HTTP-EQUIV="Refresh" content="0;url=index.php">';
}

?>