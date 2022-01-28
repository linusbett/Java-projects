<?php

//start session
session_start();
//create constants to store nonrepeating values
define('SITEURL','http://localhost:8080/Record_Management_System/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'record');

$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());//database connection

$courttype = $_POST['courttype'];
$casetype = $_POST['casetype'];
$category = $_POST['category'];
$caseno = $_POST['caseno'];
$registry = $_POST['registry'];
$officers = $_POST['officers'];
$daterecieved = $_POST['daterecieved'];
$finalorder = $_POST['finalorder'];
$dateoffinal = $_POST['dateoffinal'];
$retention = $_POST['retention'];
$dateofdisposal = $_POST['dateofdisposal'];
$remarks = $_POST['remarks'];

// Selecting Database
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //selecting database

if (isset($_POST['empname'])) {

//Insert Query
$insert= "insert into fileregistration(emp_id, emp_name , email, phone, address, username, password) 
values ('','$name', '$email', '$phn', '$address','$uname', '$password')"; 

if($conn->query($insert)){
 echo 'Data inserted successfully';
}
else{
 echo 'Error '.$conn->error;  
}

mysql_close($connection); // Connection Closed
?>
<?php

?>