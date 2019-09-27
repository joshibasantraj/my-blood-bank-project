<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
}

echo "hello". $_SESSION['username'];


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="logout.php">logout</a>
</body>
</html>