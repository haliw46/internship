<?php
include 'connect.php';
$strSQL = "SELECT * FROM member";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$str_start = strtotime($str_start);




$todaydate=date("Y-m-d");
$birthday="1975-08-24";

$age= $todaydate - $birthday;
echo $age;

?>
