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
<h1>Update User<h1>
<br /><br />
<?php 
include('connect.php');
//Get the id of the selected User
$id = $_GET['id'];  

//create the sql query to get the details
$sql = "SELECT * FROM user where id=$id";

//execute the query
$res = mysqli_query($conn, $sql);

//check whether the query is executed or not
if($res==true)
{
	//check whether the data is available or not
	$count = mysqli_num_rows($res);
	//check whether we have user data or not
	if($count==1)
	{
		//Get the details
		//echo "user Available";
		$row=mysqli_fetch_assoc($res);

		$fullname =$row['fullname'];
        $email =$row['email'];
		$username =$row['username'];
        $phone =$row['phone'];

	}
	else {
	//Redirect to manage user page
	header('location:'.SITEURL.'main/users.php');
}

}

?>
<form action="" method="POST">
<table class="tbl-30">
<tr>
<td>Full Name:</td>
<td> 
<input type="text" name="fullname"value="<?php echo $fullname?>">
</td>
</tr>
<tr>
<td>Email:</td>
<td> 
<input type="text" name="email"value="<?php echo $email?>">
</td>
</tr>
<tr>
<td>Username:</td>
<td> 
<input type="text" name="username"value="<?php echo $username?>">
</td>
</tr>
<tr>
<td>Phone:</td>
<td> 
<input type="text" name="phone"value="<?php echo $phone?>">
</td>
</tr>
<tr>
<td colspan="2"> 
<input type="hidden" name="idd"value="<?php echo $id ?>">
<input type="submit" name="submit"value="Update User"class="btn-secondary">
</td>
</tr>
</table>
</form>

<?php 
//check whether the button is clicked or not
if(isset($_POST['submit']))
{
	//echo "button clicked";
	//get all the values from form to Update
	$id = $_POST['id'];
	$fullname = $_POST['fullname'];
    $email = $_POST['email'];
	$username = $_POST['username'];
    $phone = $_POST['phone'];


	//create sql query to update user
	$sql = "UPDATE user SET
	fullname ='$fullname',
    email ='$email'
	username ='$username'
    phone ='$phone'
	WHERE id='$id'
	";

	//execute the query
	$res = mysqli_query($conn, $sql);

	//check whether the query executed successfully or not
	if($res==true)
	{
		    // User Updated successfully
			//create session variable to display message
       $_SESSION['Update'] = "<div class='success'>User updated successfully</div>";
		//Redirect page to manage user page 
		header('location:'.SITEURL.'main/users.php');
	}
	else 
	{
	       // Failed to update User
		   //create session variable to display message
        $_SESSION['Update'] = "<div class='error'>Failed to update User</div>";
		//Redirect page to manage admin page 
		header('location:'.SITEURL.'main/users.php');
}

}


?>
</div>  

   <div id="footer">
  <p>&copy;Copyright 2022 &bull; All Rights Reserved &bull; Judiciary Mombasa Law Courts</p>
    </div>