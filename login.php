<?php
session_start();
$errmsg_arr = array();
$errflag = false;
// configuration
$dbhost 	= "localhost";
$dbname		= "record";
$dbuser		= "root";
$dbpass		= "";

// database connection
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

// new data

$username = $_POST['username'];
$password = $_POST['password'];

if($username == '') {
	$errmsg_arr[] = 'You must enter your Username';
	$errflag = true;
}
if($password == '') {
	$errmsg_arr[] = 'You must enter your Password';
	$errflag = true;
}

// query
$result = $conn->prepare("SELECT * FROM user WHERE username= :hjhjhjh AND password= :asas");
$result->bindParam(':hjhjhjh', $username);
$result->bindParam(':asas', $password);
$result->execute();
$rows = $result->fetch(PDO::FETCH_NUM);
if($rows["usertype"]=="user")
{
	echo "user";
}
elseif($rows["usertype"]=="admin")
{
	echo "admin";
}
else{
	echo "username or password incorrect";
}
if($rows > 0) {
header("location: main/dashboard.php");
}
else{
	$errmsg_arr[] = 'Username and Password are not found';
	$errflag = true;
}
if($errflag) {
	$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	session_write_close();
	header("location: index.php");
	exit();
}
/*
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["username"];
	$password=$_POST["password"];
	$sql="select * from user where username='".$username."' AND password='".$password."'";
	$result=mysqli_query($conn, $sql);
	$row=mysqli_fetch_array($result);
	if($row["usertype"]=="user")
	{
		echo "user";
	}
	elseif($row["usertype"]=="admin")
	{
		echo "admin";
	}
	else{
		echo "username or password incorrect";
	}
}
*/


?>