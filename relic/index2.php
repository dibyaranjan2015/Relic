<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1)
{
?>
<!DOCTYPE html>
<html>
<head>


</head>

<body>

<h2>Sorry, we are updating valuable information. Please bear with us</h2>
</body>

</html>
<?php
}
else
{
?>

<!DOCTYPE html>
<html class="home">
<head>

</head>

<body >
	<h2>Sorry, we are updating valuable information. Please bear with us</h2>

</body>

</html>

<?php
}
?>