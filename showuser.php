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
						<li>
							<a href="overview.php">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li class="active">
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
<?php
	session_start();
	if($_SESSION['Username'] == "")
	{
		echo "Please Login!";
		exit();
	}
	
	include 'connect.php';
	$strSQL = "SELECT * FROM member WHERE Username = '".$_SESSION['Username']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>
<html>
<head>
<title>ThaiCreate.Com Tutorials</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<form name="form1" method="post" action="save.php">
			<p>
      	<label>Password</label>
				<input name="txtPassword" type="password" id="txtPassword" value="<?php echo $objResult["Password"];?>">
			</p>
			<p>
      	<label>CheckPassword</label>
				<input name="txtConPassword" type="password" id="txtPassword" value="<?php echo $objResult["Password"];?>">
			</p>
      <p>
      	<label>Name</label>
				<input name="txtName" type="text" id="txtName" value="<?php echo $objResult["Name"];?>">
			</p>
			<p>
				<label>Position</label>
				<input name="txtposition" type="text" id="txtposition" value="<?php echo $objResult["position"]; ?>" readonly>
			</p>
<button type="submit" class="btn btn-default">Save</button>
</form>
</body>
</html>
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