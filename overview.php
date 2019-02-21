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
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>บังคับ
					<a href="insertmain.php"><button type="submit" class="btn btn-warning">Edit</button></a>
				</div>
				<?php
				$strSQL = "SELECT course.name_c,main.ucid,main.total FROM course,member,main WHERE course.no_c=main.no_c and main.Username=member.Username";
				$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
				?>
				<table class="table table-bordered">
					<tr>
					<th width="20"><i class="glyphicon glyphicon-pencil"></i></th>
					<th width="60%">รายการ</th>
					<th>แก้ไข</th>
					<th>ลบ</th>
					<th>วันที่เหลือ</th>
					</tr>
					<?php 
					//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
					while($objResult = mysql_fetch_array($objQuery)){         
						echo "<tr>";
						echo "<td>".'<i class="glyphicon glyphicon-pencil"></i>'."</td>";
						echo "<td>".$objResult['name_c']."</td>";
						echo "<td><a href=\"editmain.php?ucid=$objResult[ucid]\">Edit</a></td>";
						echo "<td><a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
						echo "<td>".$objResult['total']."</td>";      
						        
					}
					?>
				</table>
				<div class="alert alert-info" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>	
					ลงเอง
				</div>
				<?php
				$strSQL = "SELECT course.name_c,other.total FROM course,member,other WHERE course.no_c=other.no_c and other.Username=member.Username";
				$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
				?>
				<table class="table table-bordered">
				<tr>
					<th width="20"><i class="glyphicon glyphicon-pencil"></i></th>
					<th width="60%">รายการ</th>
					<th>แก้ไข</th>
					<th>ลบ</th>
					<th>วันที่เหลือ</th>
				</tr>
				<?
				while($objResult = mysql_fetch_array($objQuery))
				{
				?>
					<tr>
						<td width="20"><i class="glyphicon glyphicon-pencil"></i></td>
						<td><?php echo $objResult["name_c"]; ?></td>
						<td width="20"><button type="submit" class="btn btn-warning">Edit</button></td>
						<td width="20"><button type="submit" class="btn btn-danger">Delete</button></td>
						<td><?php echo $objResult["total"]; ?></td>
					</tr>
					<?
				}
				?>
				</table>
				<div class="alert alert-success" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>	
					คนอื่นแนะนำ
				</div>
				<?php
				$strSQL = "SELECT course.name_c,recommend.total FROM course,member,recommend WHERE course.no_c=recommend.no_c and recommend.Username=member.Username";
				$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
				?>
				<table class="table table-bordered">
				<tr>
					<th width="20"><i class="glyphicon glyphicon-pencil"></i></th>
					<th width="60%">รายการ</th>
					<th>แก้ไข</th>
					<th>ลบ</th>
					<th>วันที่เหลือ</th>
				</tr>
				<?
				while($objResult = mysql_fetch_array($objQuery))
				{
				?>
					<tr>
						<td width="20"><i class="glyphicon glyphicon-pencil"></i></td>
						<td><?php echo $objResult["name_c"]; ?></td>
						<td width="20"><button type="submit" class="btn btn-warning">Edit</button></td>
						<td width="20"><button type="submit" class="btn btn-danger">Delete</button></td>
						<td><?php echo $objResult["total"]; ?></td>
					</tr>
					<?
				}
				?>
				</table>
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
<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 1, 2020").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
