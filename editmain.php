<?php
date_default_timezone_set('asia/bangkok');
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
                <form action="editsave.php?Username=<?php echo $_GET["Username"]; ?>"method="post">
                    <?php
                    $id = $_GET['id'];
                        include 'connect.php';
                        $strSQL = "SELECT * FROM member WHERE Username = '" . $_GET["id"] . "' ";
                        $objQuery = mysql_query($strSQL);
                        $objResult = mysql_fetch_array($objQuery);
                if (!$objResult) {
                    echo "$strSQL"."<br>";
                    echo "Not found CustomerID=" . $_GET["Username"];
                }
                else {
                    ?>
					<?
					$strSQL = "SELECT * FROM main ";
					$objQuery = mysql_query($strSQL);
					$objResult = mysql_fetch_array($objQuery);
					?>
                   <form class="form-style-7">
						<ul>
							<li>
							<label>ชื่อวิชา:</label>
								<select id="job" name="txtco_c">
								<optgroup label="เลือกซักอัน">
									<option value="101">Fishkeeping</option>
									<option value="102">Reading</option>
									<option value="103">Boxing</option>
									<option value="104">Debate</option>
									<option value="105">Gaming</option>
								</optgroup>
								</select>      
							</li>
							<li>
								<label>วันที่ลง</label>
								<input type="date" name="txtstartcourse">
								
							</li>
							<li>
								<label>วันสิ้นสุด</label>
								<input type="date" name="txtendcourse">
							</li>
						</ul>
						<button type="submit" class="btn btn-success">Save</button>
						<button type="reset" class="btn btn-danger">Reset</button>
						</form>
						
                
                    <?php
                }
                ?>
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
