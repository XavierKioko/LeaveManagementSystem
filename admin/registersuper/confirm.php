<link rel="shortcut icon" type="image/png" href="favicon.png"/>
<?php
session_start();
include 'connect.php';
include 'mailer.php';
?>							
<link rel="stylesheet" href="style.css">
<title>::Leave Management::</title>
<?php
if(isset($_SESSION['adminuser']))
{
	$sql = "SELECT Dept,username FROM admins WHERE username = '".$_SESSION['adminuser']."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			//$dept = $row["Dept"];
		}
include 'adminnavi.php';
$errmsg = $sql = "";
$empname = trim($_POST['empname']);
$uname = trim($_POST['uname']);
$dept = trim($_POST['dept']);
$mailid = trim($_POST['emailId']);
//doj = trim($_POST['year-join'])."-".trim($_POST['month-join'])."-".trim($_POST['date-join']);
//$dob = trim($_POST['year-birth'])."-".trim($_POST['month-birth'])."-".trim($_POST['date-birth']);
//$dob2 = trim($_POST['date-birth'])."-".trim($_POST['month-birth'])."-".trim($_POST['year-birth']);
$empname = strip_tags($empname);
$uname = strip_tags($uname);
$dept = strip_tags($dept);
//$doj = strip_tags($doj);
//$dob = strip_tags($dob);
//$dob2 = strip_tags($dob2);
//$pass = $dob2;
//$designation = strip_tags(trim($_POST['designation']));
//$emptype = strip_tags(trim($_POST['factype']));
//$supervisor = strip_tags(trim($_POST['supervisor']));
$earnleave = 0;
$sickleave = 0;
$casualleave = 0;

$maternityleave = 0;
$paternityleave = 0;
$annualleave = 0;
if(empty($uname) || empty($dept)||empty($mailid))
	{
		$errmsg.="One or more fields are empty...";
	}
else{	
$sql = "SELECT username,EmpEmail FROM Supervisor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
			if($uname == $row["username"])
				{
					$errmsg.=" Username ".$uname." already taken...";
				}
			if($mailid == $row["EmpEmail"])
				{
					$errmsg.=" Your Entered Email ID is already registered with another user...";
				}
		}
	}
if ((!filter_var($mailid, FILTER_VALIDATE_EMAIL)) || empty($mailid)) {
  $errmsg.="Invalid email ID...";
	}
}
$sql2 = "SELECT * FROM admins WHERE username = '".$_SESSION['adminuser']."'";
if($conn->query($sql2) == TRUE)
	{
		$result = $conn->query($sql2);
		if($result->num_rows > 0)
			{
				while($row2 = $result->fetch_assoc())
					{
						$earnleave = $row2['SetEarnLeave'];
						$sickleave = $row2['SetSickLeave'];
						$casualleave = $row2['SetCasualLeave'];						
						$maternityleave = $row2['SetMaternityLeave'];
						$paternityleave = $row2['SetPaternityLeave'];
						$annualleave = $row2['SetAnnualLeave'];
					}
			}
	}
if(!empty($errmsg))
	{
	header('location:index.php?err='.htmlspecialchars(urlencode($errmsg)));
	}
else
	{
		echo "<div class = 'reg-form'>";
		$pw = $uname;
		$sql = "INSERT INTO supervisor (username,password,Dept,setSickLeave,setCasualLeave,setEarnLeave,setMaternityLeave,setPaternityLeave,setAnnualLeave,EmpEmail) VALUES "."('".$uname."','".$pw."','".$dept."','".$sickleave."','".$casualleave."', '".$earnleave."','".$maternityleave."','".$paternityleave."','".$annualleave."','".$mailid."')";                        
		if ($conn->query($sql) === TRUE) {
			echo "<center>";
			echo "<strong> Registration Successful!</strong><br/><br/>";
			echo "<u>Registration Details :</u><br/>";
			echo "Username : ".$uname."<br/>";
			//echo "Employee Name : ".$empname."<br/>";
			echo "Department : ".$dept."<br/>";
			//echo "Email id : ".$mailid."<br/>";
			//echo "Date Of Joining : ".$doj."<br/>";
			//echo "Designation : ".$designation."<br/>";
			//echo "Employment Type : ".$emptype." ; ".$supervisor."<br/>";
			//echo "Date Of Birth : ".$dob2."<br/>";
			//$msg = "Registration Successful! \n\nUsername : ".$uname."\nEmployee Name : ".$empname."\nPassword : ".$pass."\nDepartment : ".$dept."\nEmail ID : ".$mailid."\nDate Of Joining (yyyy/mm/dd): ".$doj."\n\n\nThanks For Registering with us\n\n\n\nRegards,\nwebadmin, Leave Management System";
			$msg = "Registration Successful! \n\nUsername : ".$uname."\nPassword : ".$pw."\nEmail ID : ".$mailid."\nDepartment : ".$dept."\n\n\nThanks For Registering with us\n\n\n\nRegards,\nwebadmin, Leave Management Systems";
		
			$to = $mailid;
			$status = mailer($to,$msg);
			if($status == true)
				{
					echo "<br/>Please check the email ".$mailid." for the confirmation page.<br/>";
				}
			echo "</center>";
			echo "</div>";
		}
			else {
				echo "Error: " . $sql . "<br>" . $conn->error;
					}
$conn->close();
	}
}
else
{
	header('location:index.php?err='.urlencode('Please Login First To Access This Page !'));
}
?>
<script type="text/javascript">
        function noBack()
         {
             window.history.forward()
         }
        noBack();
        window.onload = noBack;
        window.onpageshow = function(evt) { if (evt.persisted) noBack() }
        window.onunload = function() { void (0) }
    </script>