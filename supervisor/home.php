<link rel="shortcut icon" type="image/png" href="favicon.png"/>
<?php
session_start();
echo "<center>";
echo "<div class = 'textview'>";
echo "<h1>Leave Management Systems</h1>";
include 'supernavi.php';
if(isset($_SESSION['superuser']))
		{
		if(isset($_GET['msg']))
			{
				echo "<div class = 'msg'><b><u>".htmlspecialchars($_GET['msg'])."</u></b></div>";
			}
		echo "<br/><h2>Welcome, " . $_SESSION["superuser"] ."</h2>";
		}
else
	{
		header('location:index.php?err='.urlencode('Please Login first to access this page'));
	}
echo "</div>";
echo "</center>";
?>

<html>
<head>
<title>::Leave Management::</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="style.css">
