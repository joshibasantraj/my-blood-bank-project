<?php
session_start();
$con=mysqli_connect('localhost','root','','karan');
if($con){
	echo "connection established";
}
else{
	die();
}

if(isset($_SESSION['username'])){
	header('location:home.php');
}
if($_POST){
$username=$_POST['username'];
$password=$_POST['password'];
$qry="SELECT * from user where $username=username and $password=password ";
$run=mysqli_query($con,$qry);
$count=mysqli_num_rows($run);
if($username=='admin' && $password=='12345'){
	$_SESSION['username']=$username;
	header('location:home.php');
}
else{
	echo "username/ password error please try again";
	
}





}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="">
		username:<input type="text" name="username" autocomplete="off"><br>
		password: <input type="password" name="password" autocomplete="off"><br>
		<input type="submit" name="submit">
	</form>

</body>
</html>




<!--  // login.php
create login form
post login page to same page
get data in variables in the same page 
  if username is admin and password is 12345
     - set a session with the users actual username
     - send to home.php

  if wrong
     - display username and password is wrong

//home.php
display session name
logout.php create
if session is not set, send to login.php




 --> 