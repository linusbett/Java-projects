<?php
require_once('connect.php');
$casetype_result = $conn->query('select * from case-type');
?>

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
/* Style the form */
#regForm {
  background-color: #ffffff;
  margin: 20px auto;
  padding: 40px;
  width: 78%;
  min-width: 300px;
}
.form-control{
    padding:10px;
    color:blue;
    margin:20px;
    align:center;
    width:50%;
    border:5px;
     }

/* Style the input fields */
input {
  padding: 10px;
  width: 50%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
#footer{
  clear:both;
  padding:10px 0;
  border-top:1px #000 dotted;
  text-align:center;
  font-size:14px;
  font-weight:bold;
}
/* css of dropdown list*/
    .selectDiv{
        background-color:#0cd1ad;
        width:78%;
        height:auto;
        margin: auto;
      }

</style>
<script src="main/js/register.js" type="text/javascript" charset="utf-8"></script>
<script src="jquery.js" type="text/javascript" charset="utf-8"></script> 
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript>

</script>
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
   <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>

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
<h2>Register File:</h2>
</div>
<div id="pagecontent">
<form id="regForm" action="storedata1.php"method="POST">

<!-- One "tab" for each step in the form: -->
<div class="selectDiv">
<div class="tab">Step 1:CASE DETAILS:</br></br></br>
        <label for="">Select Court</label></br>
        <select name="courttype" class="form-control" id="courttype" >>
        <option value="">High Court</option>
        <option value="">Lower Court</option>
        </select>
       </br>
       <label for="">Select Case type</label></br>
       <select name="casetype" class="form-control" id="casetype" onchange="updatecategory();">casetype</select>
      <br>
      <label for="">Select Category</label></br>
      <select name="category"class="form-control" id="category" >category</select></br>
      <label for="">Case No:</label></br>
      <input class="form-control" name="caseno" id ="caseno" placeholder="CASE NO..." ></br>
  </div>
    </div>
<!-- java script for the dropdown list-->
<script>
        var myArraycasetype = [
     {"casetype" : "civil" },
     {"casetype" : "criminal" }];
    function updatecategory() {var zone = document.getElementById("casetype");
    if (zone.value == "civil"){alert("You clicked civil.");
    var myArraycategory = [ {"category" : "CMCC-Civil Case" },
    {"category" : "CMSUCC-Succession Case" },{"category" : "CMELRC-Employment&Labour Relations Case" },{"category" : "CMELC-Environment&Land Case" },{"category" : "CMDIV-Divorce Case" },{"category" : "CMMISC-Miscellaneous" },];
    categoryFunction(myArraycategory)}
    if (zone.value == "criminal"){alert("You clicked criminal.");
    var myArraycategory = [ {"category" : "CMCR-Criminal Case" }, {"category" : "CMSO-Sexual Offence" },{"category" : "CMAC-Anti-Corruption" },{"category" : "CMMISC-Miscellaneous" },{"category" : "CMINQ-Inquest" },];
    categoryFunction(myArraycategory)}}
    casetypeFunction(myArraycasetype);
    function casetypeFunction(arr) { var out = ""; var i; 
    for(i = 0; i < arr.length; i++) {out += '<option value="' + arr[i].casetype + '">' + arr[i].casetype + '</option>' + arr[i].display + '</a><br>'; }
    document.getElementById("casetype").innerHTML = out;}
    var myArraycategory = [{"category" : "CMCC-Civil Case" },
    {"category" : "CMSUCC-Succession Case" },{"category" : "CMELRC-Employment&Labour Relations Case" },{"category" : "CMELC-Environment&Land Case" },{"category" : "CMDIV-Divorce Case" },{"category" : "CMMISC-Miscellaneous" },];
    categoryFunction(myArraycategory);
    function categoryFunction(arr) { var out = ""; var i;
    for(i = 0; i < arr.length; i++) {out += '<option value="' + arr[i].category + '">' + arr[i].category + '</option>' + arr[i].display + '</a><br>'; }
    document.getElementById("category").innerHTML = out;}
    </script>

<div class="selectDiv">
<div class="tab">Step 2:</br>
<label>Parties:</label><br>
  <textarea placeholder="Enter the parties"class="form-control"name="parties"id="parties"></textarea>
  <br>
      <label for="">Creating Registry</label></br>
     <select name="registry" class="form-control" id="registry">
    <option value="category">CMCC-Criminal Case</option>
    <option value="category">CMMISC-Miscellaneous</option>
    <option value="category">CMSO-Sexual Offence</option>
    <option value="category">CMAC-Anti-Corruption</option>
    <option value="category">CMINQ-Inquest</option>
    <option value="category">CMCC-Civil Case</option>
    <option value="category">CMSUCC-Succession Case</option>
    <option value="category">CMELRC-Employment&Labour Relations Case</option>
    <option value="category">CMELC-Environment&Land Case</option>
    <option value="category">CMDIV-Divorce Case</option>
</select>
</br>

  <label for="">Recieving Officer:</label>
</br>
 <select name="officers" class="form-control" id="officers">
<option>--Select Officers--</option>
<?php
// configuration
$query = "SELECT * FROM user";
if($result=mysqli_query($conn, $query)){
  if(mysqli_num_rows($result) >0){
  while($row = mysqli_fetch_array($result)){
    $fullname=$row["fullname"];
    echo "<option>$fullname</option>";
  }
  }
  }
?> 
</select><br>
  <label>Date Recieved:</label><br>
  <p><input type="date" name="daterecieved" class="form-control"id="daterecieved"></p>
</div>
</div>

<div class="selectDiv">
<div class="tab">Step 3:Retention/disposal:</br></br>
<label>Final Order:</label><br>
  <textarea placeholder="Enter the Final Orders"class="form-control"name="finalorder"id="finalorder"></textarea>
  <br>
  <label>Date Of Final Order</label>
</br>
  <input type="date" name="dateoffinal"id="dateoffinal" class="form-control">
  <br>
  <label>Retention Period</label>
  <br>
<input type="number"id ="retention"name="retention"class="form-control"><br>
  <label>Disposal Date</label><br>
  <p><input type="date"id="dateofdisposal" name="dateofdisposal" class="form-control"></p>
</div>
<div class="tab">Step 4: Remarks:</br>
<div class="selectDiv">
  <textarea placeholder="Enter the Remarks"id="remarks"name="remarks"class="form-control"></textarea>
    </div>
   </div>
</div>

<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
   <!-- <button type="button" id="nextBtn"onclick="nextPrev(4)">Submit</button>-->
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>
</form>

<script>
  //javascript for the registration form
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return TRUE;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

</div>
<div id="footer">
  <p>&copy;Copyright 2022 &bull; All Rights Reserved &bull; Judiciary Mombasa Law Courts</p>
  </div>
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
   url: "deleteoffice.php",
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