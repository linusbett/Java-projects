<style>
body {
	background: #D7D5D5;
}
table { border-collapse: separate; background-color: #FFFFFF; border-spacing: 0; width: 85%; color: #666666; text-shadow: 0 1px 0 #FFFFFF; border: 1px solid #CCCCCC; box-shadow: 0; margin: 0 auto;font-family: arial; }
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
	width: 83%;
	clear: both;
	height: 34px;
}
#pagecontent{
  width: 78%;
  background-color:#ffffff;
  margin:auto;

}
#filter {
	-moz-box-sizing: border-box;
    background: url("img/big_search.png") no-repeat scroll 10px 10px #FFFFFF;
    box-shadow: none;
    display: block;
    font-size: 12px;
    height: 34px;
    padding: 9px 140px 9px 28px;display: block;
    font-size: 12px;
    height: 34px;
    padding: 9px 140px 9px 28px;
    width: 85%;
	border: 1px solid #DADADA;
    transition: border 0.2s linear 0s, box-shadow 0.2s linear 0s;
	padding-top: 6px;
	float: left;
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
<p>This is the judiciary home page</p>
</div>
<table cellspacing="0" cellpadding="2" id="resultTable">

<thead>

</thead>
<tbody>
<div id="footer">
  <p>&copy;Copyright 2022 &bull; All Rights Reserved &bull; Judiciary Mombasa Law Courts</p>
  </div>
	<?php
	?>
</tbody>
</table>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "delete.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>