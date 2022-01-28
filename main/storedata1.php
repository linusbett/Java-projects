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
$parties = $_POST['parties'];
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

if (isset($_POST['regForm'])) {

//Insert Query
$insert= "insert into fileregistration(court, casetype, category, caseno, parties, registry, officers, dateRecieved,finalOrder, dateOfFinal, period,disposalDate, remarks) 
values ('','$courtype', '$casetype', '$category', '$caseno','$parties', '$registry', '$officers', '$daterecieved', '$finalorder', '$dateoffinal', '$retention', '$dateofdisposal', '$remarks')"; 

if($conn->query($insert)){
 echo 'Data inserted successfully';
}
else{
 echo 'Error '.$conn->error;  
}
mysql_close($conn); // Connection Closed
}
?>