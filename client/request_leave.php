<title>::Leave Management::</title>
<?php
session_start();
include 'connect.php';
if(isset($_SESSION['user']))
	{
	echo "<link rel='stylesheet' type='text/css' href='style.css'>";
	echo "<center>";
	echo "<div class = 'textview'>";
	echo "<h1>Leave Management System</h1>";
	include 'clientnavi.php';
	echo "<h2>Please Select Your Leave Type</h2>";
	if(isset($_GET['err']))
				{
				echo "<div class = 'error'><b><u>".htmlspecialchars($_GET['err'])."</u></b></div>";
				}
	echo "<form action = 'leaverequest.php' method = 'post'>";
	$sql = "SELECT * FROM employees WHERE UserName = '".$_SESSION['user']."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
				{
				if($row['SickLeave'] > 0)
					{
					echo "<button type = 'submit' name = 'type' value = 'Sick Leave' class = 'login-button shadow'>Sick Leave</button>";	
					}
				else
					{
						echo "<button type = 'submit' name = 'type' value = 'Sick Leave' class = 'error-button shadow' disabled>Sick Leave</button>";
					}
				/*if($row['EarnLeave'] > 0)
					{
					echo "<button type = 'submit' name = 'type' value = 'Earn Leave' class = 'login-button shadow'>Earn Leave</button>";	
					}
				else
					{
						echo "<button type = 'submit' name = 'type' value = 'Earn Leave' class = 'error-button shadow' disabled>Earn Leave</button>";
					}*/
				if($row['CasualLeave'] > 0)
					{
					echo "<button type = 'submit' name = 'type' value = 'Casual Leave' class = 'login-button shadow'>Casual Leave</button>";	
					}
				else
					{
						echo "<button type = 'submit' name = 'type' value = 'Casual Leave' class = 'error-button shadow' disabled>Casual Leave</button>";
					}
				if($row['MaternityLeave'] > 0)
					{
					echo "<button type = 'submit' name = 'type' value = 'Maternity Leave' class = 'login-button shadow'>Maternity Leave</button>";	
					}
				else
					{
						echo "<button type = 'submit' name = 'type' value = 'Maternity Leave' class = 'error-button shadow' disabled>Maternity Leave</button>";
					}
					if($row['PaternityLeave'] > 0)
					{
					echo "<button type = 'submit' name = 'type' value = 'Paternity Leave' class = 'login-button shadow'>Paternity Leave</button>";	
					}
				else
					{
						echo "<button type = 'submit' name = 'type' value = 'Paternity Leave' class = 'error-button shadow' disabled>Paternity Leave</button>";
					}
				if($row['AnnualLeave'] > 0)
					{
					echo "<button type = 'submit' name = 'type' value = 'Annual Leave' class = 'login-button shadow'>Annual Leave</button>";	
					}
				else
					{
						echo "<button type = 'submit' name = 'type' value = 'Annual Leave' class = 'error-button shadow' disabled>Annual Leave</button>";
					}
				}
		}
	echo "</form>";
	}
	else
		{
		header('location:index.php?err='.urlencode('Please Login for Accessing this page'));
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