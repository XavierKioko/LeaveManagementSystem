<link rel="shortcut icon" type="image/png" href="favicon.png"/>
<?php
session_start();
?>
<html>
<head>
<title>::Leave Management::</title>
<link rel="stylesheet" href="style.css">

</head>
<body>
<div class="reg-form">
<center>
<h1>Leave Management System</h1>
<?php
include 'adminnavi.php';
include 'connect.php';?>
<h2>New Supervisor Registrations</h2>
<i><div class = 'error'>*indicates mandatory fields</div></i>
<?php
if(isset($_GET['err']))
	{
		echo "<div class = 'error'><b><u>".htmlspecialchars($_GET['err'])."</u></b></div>";
	}
if(isset($_SESSION['adminuser']))
	{
	$sql = "SELECT username FROM supervisor";
	$result = $conn->query($sql);	
	$optionresults="<option>Select Supervisor</option>";
	while($row = $result->fetch_assoc()) {
		$optionresults=$optionresults."<option>" . $row['username'] . "</option>";
    }
	echo"<form action = 'confirm_supervisor.php' method = 'post'>
	<table>
	<tr><td><div class = 'error'>*</div> Employee Name : </td><td><input type = 'text' name = 'empname' class = 'reg-form-fields shadow selected' placeholder = 'Supervisor Name'></td></tr><br>
<tr><td><div class = 'error'>*</div> Username : </td><td><input type = 'text' name = 'uname' class = 'reg-form-fields shadow selected' placeholder = 'Supervisor Username'></td></tr><br>
<tr><td><div class = 'error'>*</div> Department : </td><td><input type = 'text' name = 'dept' class = 'reg-form-fields shadow selected' placeholder = 'Supervisor Department'></td></tr><br>
<tr><td><div class = 'error'>*</div> Email Id : </td><td><input type = 'text' name = 'emailId' class = 'reg-form-fields shadow selected' placeholder = 'Supervisor Email Id'></td></tr><br>
<tr><td><input type = 'submit' value = 'Register' class = 'registration shadow'></td></tr>
</form>
</table>
</center>
</div>";
	}
	else
	{
		header('location:../index.php?err='.urlencode('Please Login First To Access This Page !'));
	}
?>
	