<html>
<head>
<title>editsave</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">

</head>
<body>
<?php
date_default_timezone_set('asia/bangkok');
include 'connect.php';
					//getting id from url
					$ucid = $_GET['ucid'];
					
					//selecting data associated with this particular id
					
					if(isset($_POST['update']))
					{    
						
						$ucid = $_POST['ucid'];
						$no_c=$_POST['no_c'];
						$startcourse=$_POST['startcourse'];
                        $endcourse=$_POST['endcourse'];
	
						// checking empty fields
						if(empty($no_c) || empty($startcourse) || empty($endcourse)) {            
							if(empty($no_c)) {
								echo "<font color='red'>no_c field is empty.</font><br/>";
							}
							
							if(empty($startcourse)) {
								echo "<font color='red'>start field is empty.</font><br/>";
							}
							
							if(empty($endcourse)) {
								echo "<font color='red'>end field is empty.</font><br/>";
							}        
						} else {    
                            //updating the table
                            
                            $strSQL = "UPDATE main SET no_c='$no_c',startcourse='$startcourse',endcourse='$endcourse' where ucid=$ucid";
                            $objQuery = mysql_query($strSQL);
							//redirectig to the display page. In our case, it is index.php
							header("Location: overview.php");
						}
					}
				?>
</body>
</html>