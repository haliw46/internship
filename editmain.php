<?php
session_start();
if ($_SESSION['Username'] == "") {
    echo "<script language=\"JavaScript\">";
    echo "alert('Please Login');window.location='index.html';";
    echo "</script>";
}

if ($_SESSION['Status'] != "ADMIN") {

}
include 'connect.php';
$strSQL = "SELECT * FROM member WHERE Username = '" . $_SESSION['Username'] . "' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
?>
<head>
    <title>WELCOME</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="css/css/css.css" rel="stylesheet">

</head>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<div class="profile-userpic">
					<img src="css/img/<?php echo $objResult["pic"]; ?>" class="img-responsive">
				</div>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
					<?php echo $objResult["Name"]; ?>
					</div>
					<div class="profile-usertitle-job">
					<?php echo $objResult["position"]; ?>
					</div>
				</div>
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="overview.php">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="showuser.php"><i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
							
						</li>
						<li>
							<a href="course.php"><i class="glyphicon glyphicon-book"></i>
							Course </a>
							
						</li>
						<li>
							<a href="howto.php">
							<i class="glyphicon glyphicon-wrench"></i>
							How To</a>
							</li>
						<li>
							<a href="logout.php"><i class="glyphicon glyphicon-log-out"></i>
							Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
				<div class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>	
					บังคับ
				</div>
				<form name="form1" method="post" action="editsave.php">
					<select name="no_c">
						<option value="101">php</option>
						<option value="102">html</option>
						<option value="103">json</option>
						<option value="104">python</option>
						<option value="105">css</option>
					</select>
					<table border="0">
						<tr> 
							<td>startcourse</td>
							<td><input type="date" name="startcourse" value="<?php echo $start;?>"></td>
						</tr>
						<tr> 
							<td>endcourse</td>
							<td><input type="date" name="endcourse" value="<?php echo $end;?>"></td>
						</tr>
						<tr>
							<td><input type="hidden" name="ucid" value=<?php echo $_GET['ucid'];?>></td>
							<td><input type="submit" name="update" value="Update"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
