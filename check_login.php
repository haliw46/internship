<?php
	session_start();
	include "connect.php";
	$strSQL = "SELECT * FROM member WHERE Username = '".mysql_real_escape_string($_POST['txtUsername'])."' 
	and Password = '".mysql_real_escape_string($_POST['txtPassword'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
		echo "<script language=\"JavaScript\">";
		echo "alert('Username and Password Incorrect!');window.location='login.html';";
		echo "</script>";
	}
	else
	{
			$_SESSION["Username"] = $objResult["Username"];
			$_SESSION["Status"] = $objResult["Status"];

			session_write_close();
			
			if($objResult["Status"] == "ADMIN")
			{
				header("location:overview.php");
			}
			else
			{
				echo "<script language=\"JavaScript\">";
				echo "alert('ไม่มีสิทธ์เข้าถึงนะครับ');window.location='index.html';";
				echo "</script>";
			}
	}
	mysql_close();
?>