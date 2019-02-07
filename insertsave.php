<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
<?php
include 'connect.php';
$strSQL = "INSERT INTO main ";
$strSQL .="(ucid,Username,no_c,startcourse,endcourse,total) ";
$strSQL .="VALUES ";
$strSQL .="('','".$_POST["txtUsername"]."','".$_POST["txtno_c"]."','".$_POST["txtstartcourse"]."','".$_POST["txtendcourse"]."','".$_POST["txttotal"]."' )";
$objQuery = mysql_query($strSQL);
if($objQuery)
{
    echo "Save Done.";
    echo "Error Save [".$strSQL."]";
}
else
{
	echo "Error Save [".$strSQL."]";
}
?>
</body>
</html>