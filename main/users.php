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
<!--main content starts here-->
     <?php
     if(isset($_SESSION['add']))
     {
          echo $_SESSION['add'];//Displaying session message 
          unset($_SESSION['add']);//Removing session message
     }
         if(isset($_SESSION['delete']))
     {
          echo $_SESSION['delete'];//Displaying session message 
          unset($_SESSION['delete']);//Removing session message
     }

          if(isset($_SESSION['update']))
     {
          echo $_SESSION['update'];//Displaying session message 
          unset($_SESSION['update']);//Removing session message
     }
            if(isset($_SESSION['user-not-found']))
     {
          echo $_SESSION['user-not-found'];//Displaying session message 
          unset($_SESSION['user-not-found']);//Removing session message
     }
           if(isset($_SESSION['password-not-match']))
     {
          echo $_SESSION['password-not-match'];//Displaying session message 
          unset($_SESSION['password-not-match']);//Removing session message
     }
             if(isset($_SESSION['change-password']))
     {
          echo $_SESSION['change-password'];//Displaying session message 
          unset($_SESSION['change-password']);//Removing session message
     }
     ?>
     <br />
     <!-- button to add user-->
     <a href="register-user.php" class="btn-primary">Add User</a>
     <br />
    <table class="tbl-full">
    <tr>
    <th>S.N</th>
    <th>Full Name</th>
    <th>Email</th>
    <th>Username</th>
    <th>Phone</th>
    <th>Actions</th>
    </tr>

    <?php
    include('connect.php');
    //query to get all users
    $sql="SELECT * FROM user";
    //execute the query
    $res=mysqli_query($conn, $sql);
     
    //check whether the query is executed or not
    if($res==TRUE)
    {
        //count rows to check whether we have data in the database or not
        $count = mysqli_num_rows($res); //function to get all the rows in the database

        $sn=1; //create a variable and assign the value

        //check the num of rows
        if($count>0)
        {
            //we have data in database  
            while($rows = mysqli_fetch_assoc($res))
            {
                //using while loop to get data from database
                //and while loop will run as long as we have data in database
               
                //get individual data
                $id=$rows['id'];
                $fullname=$rows['fullname'];
                $email=$rows['email'];
                $username=$rows['username'];
                $phone=$rows['phone'];
                

                //display the values in our table
                ?>

                     <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $fullname; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $phone; ?></td>
                        
                        <td>
                        <a href="<?php echo SITEURL; ?>main/change-pass.php?id=<?php echo $id; ?>"class="btn-primary">Change Password</a>
                        <a href="<?php echo SITEURL; ?>main/update-user.php?id=<?php echo $id; ?>" class="btn-secondary">Update User</a>
                        <a href="<?php echo SITEURL; ?>main/delete-user.php?id=<?php echo $id; ?>" class="btn-danger">Delete User</a>
                        </td>
                     </tr>

                <?php

            }
             
        }
        else {
	//we do not have data in the database
    }

    }
    
    ?>


    </table>
  

	<?php

	?>


</div>
<div id="footer">
  <p>&copy;Copyright 2022 &bull; All Rights Reserved &bull; Judiciary Mombasa Law Courts</p>
  </div>