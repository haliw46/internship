<?php
	session_start();
	if($_SESSION['Username'] == "")
	{
		echo "Please Login!";
		exit();
	}
include 'connect.php';
	
	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		echo "Password not Match!";
		exit();
	}
	$strSQL = "UPDATE member SET Password = '".trim($_POST['txtPassword'])."'
    ,Name = '".trim($_POST['txtName'])."'
    ,Position = '".trim($_POST['txtposition'])."' WHERE Username = '".$_SESSION["Username"]."' ";
	$objQuery = mysql_query($strSQL);
	
	echo "Save Completed!<br>";		
	
	if($_SESSION["Status"] == "ADMIN")
	{
		echo "<script language=\"JavaScript\">";
		echo "alert('Done');window.location='showuser.php';";
		echo "</script>";
	}
	else
	{
		echo "<br> Go to <a href='user_page.php'>User page</a>";
	}
	
	mysql_close();
?>