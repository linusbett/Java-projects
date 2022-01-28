<?php
//include contants.php file here
include('connect.php');

//1. get the ID of user to be deleted
$id=$_GET['id'];
//2. create sql query to delete user
$sql = "DELETE FROM user where id=$id";

//execute query 
			$res = mysqli_query($conn, $sql);

			//check whether the query executed successfully or not

if($res==true)
{
			//query executed successfully and user deleted 
			//echo "user deleted";
			//create session variable to display message
          $_SESSION['delete'] = "<div class='success'>User Deleted successfully</div>";
		  //Redirect page to manage user page 
		  header('location:'.SITEURL.'main/users.php');
}
else {
	         //fail to delete user
	         //echo "Failed to delete user";
	         $_SESSION['delete'] = "<div class='error'>Failed to delete user, Try Again Later</div>";
		     header('location:'.SITEURL.'main/users.php');
}

//3. Redirect to manage user page with message (success/error)