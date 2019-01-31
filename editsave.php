<html>
<head>
<title>editsave</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">

</head>
<body>
<?php
include'connect.php';
$strSQL = "UPDATE main SET ";
$strSQL .="id = '".$_POST["txtco_c"]."' ";
$strSQL .=",name = '".$_POST["txtstartcourse"]."' ";
$strSQL .=",des1 = '".$_POST["txtendcourse"]."' ";
$objQuery = mysql_query($strSQL);
if($objQuery)
{
    echo "<script language=\"JavaScript\">";
    echo "alert('Save done');";
    echo "window.open(\"adminsearch.php\",\"_self\");";
    echo "</script>";    
}
else
{
	echo "Error Save [".$strSQL."]";
}
?>
</body>
</html>