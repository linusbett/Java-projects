<?phpinclude('connect.php');?>
<style>
body {
	background: #D7D5D5;
}
table { border-collapse: separate; background-color: #FFFFFF; border-spacing: 0; width: 80%; color: #666666; text-shadow: 0 1px 0 #FFFFFF; border: 1px solid #CCCCCC; box-shadow: 0; margin: 0 auto;font-family: arial; }
table thead tr th { background: none repeat scroll 0 0 #EEEEEE; color: #222222; padding: 10px 14px; text-align: left; border-top: 0 none; font-size: 12px; }
table tbody tr td{
    background-color: #FFFFFF;
	font-size: 12px;
    text-align: left;
	padding: 10px 14px;
	border-top: 1px solid #DDDDDD;
}
#log {
	width: 90%;
	margin: 20px auto;
	font-family: arial;
	padding: 20px;
	background-Color: #2b3b2a;
}
#log a {
	color: #FFFFFF;
	text-decoration: none;
	font-family: arial;
}
#log h1{
  text-align:center;
  font-weight:bold;
  color:#d2b433;
}
.heading{
  color:#e28743;
  font-weight:bold;
  text-align:left;
}
#logo img{
  width:70px;
  height:60px;
  float:left;

}
#topnav{
  clear:both;
  text-align:right;
}
#topnav ul li {
  display:inline;
  list-style-type:none;
  margin:0 20px 0 0;
}
#topnav li li a{
  color: #FFFFFF;
	text-decoration: none;
	font-family: arial;
}
#formdesign {
	background: linear-gradient(to bottom, #FFFFFF 0%, #F6F6F6 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: 1px solid #D5D5D5;
    padding: 12px;
    position: relative;
	margin: 20px auto;
	width: 78%;
	clear: both;
	height: 34px;
}
#pagecontent{
  width: 78%;
  background-color:#ffffff;
  margin:auto;

}

#footer{
  clear:both;
  padding:10px 0;
  border-top:1px #000 dotted;
  text-align:center;
  font-size:14px;
  font-weight:bold;
}

</style>
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
   <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
 <div id="log">
 <div id="logo">
  <img src="img/logo2.jpg">
  </div>
  <h1>MOMBASA LAW COURTS ARCHIVE SYSTEM</h1>
   <div id="topnav">
   <ul>
    <li> <a href="dashboard.php">Dashboard</a></li>
    <li> <a href="index.php">Home</a></li>
    <li> <a href="register.php">Register File</a></li>
    <li> <a href="search.php">Search File</a></li>
    <li> <a href="reports.php">Reports</a></li>
    <li> <a href="users.php">Users</a></li>
    <li> <a href="../index.php">Logout</a></li>
  </ul>
  <h2 class="heading">JUDICIARY MOMBASA LAW COURTS</h2>
  </div>
</div>
<div id="formdesign">
<h2>Manage Users</h2>
</div>
<div id="pagecontent">
<h1>Change Password</h1>
<br /><br />
<?php
if(isset($GET['ID']))
{
	$id=$_GET['id'];
}
?>

<form action="" method="POST">
<table class="tbl-30">
<tr>
<td>Current password:</td>
<td> 
<input type="password" name="current_password"placeholder="current password">
</td>
</tr>
<tr>
<td>New password:</td>
<td> 
<input type="password" name="new_password"placeholder="new password">
</td>
</tr>
<tr>
<td>Confirm Password:</td>
<td> 
<input type="password" name="confirm_password"placeholder="confirm password">
</td>
</tr>
<tr>
<td colspan="2"> 
<input type="hidden" name="id"value="<?php echo $id ?>">
<input type="submit" name="submit"value="Change Password"class="btn-secondary">
</td>
</tr>
</table>
</form>


<?php
include('connect.php');
if(isset($_POST['submit']))
{
	//echo "clicked";

	//Get data from form
	$id=$_POST['id']; 
	$current_password=($_POST['current_password']);
	$new_password=($_POST['new_password']);
	$confirm_password=($_POST['confirm_password']);


	//check whether the user with current id and Password exists or not
	$sql = "SELECT * FROM user WHERE id=$id AND Password='$current_password'";

	//execute query
	$res=mysqli_query($conn, $sql);

	if($res==TRUE)
	{
		//check whether data is available or not
		$count = mysqli_num_rows($res);


		if($count==1) 
		{
			//user existsand password can be changed.
			echo "user found";
			if($new_password==$confirm_password)
		{
			//update the Password
			//echo "Password match";
			$sql2 = "UPDATE user SET
			Password='$new_password'
			WHERE id=$id
			";
			//execute the query
			$res2 = mysqli_query($conn, $sql2);
			//check whether the query is executed or not 
			if($res2==TRUE)
			{
				//Display success message
		     // Redirect user to manage admin page with success message
        $_SESSION['change-password'] = "<div class='success'>password changed successfully</div>";
		//Redirect page to manage user page 
		header('location:'.SITEURL.'main/users.php');
			}
			else 
			{
				//Display error message
			    // Redirect user to manage user page with success message
	        $_SESSION['change-password'] = "<div class='error'>Failed to change password</div>";
		    header('location:'.SITEURL.'main/users.php');
			}

		}
		else
		 {
	          // Redirect user to manage user page with error message
		     $_SESSION['password-not-match'] = "<div class='error'>Password Did Not Match</div>";
		     header('location:'.SITEURL.'main/users.php');

         }


		}

		else {
	          //user doesnt exist set message and Redirect
               $SESSION['user-not-found'] = "<div class='error'>User Not Found.</div>";
               //Redirect user to manage admin page
		       header('location:'.SITEURL.'admin/manage-admin.php');
		  }
     
	} 

	    //check whether the new Password and confirm match or not

	    //change password if all of the above is true
}

?>
</div>  

   <div id="footer">
  <p>&copy;Copyright 2022 &bull; All Rights Reserved &bull; Judiciary Mombasa Law Courts</p>
    </div>