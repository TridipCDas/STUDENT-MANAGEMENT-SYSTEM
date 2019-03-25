<?php
session_start();
if(isset($_SESSION['userid'])){
	echo "";
}
else{
	header('location:../login.php');
	?>
	<script> alert('Admin login is required!!');</script>
	<?php
}
?>
<?php
include('header.php');
?>

<div class="admintitle" align="center">
	<h2 class="logout"><a href="logout.php">Logout</a></h2>
	<h1>Welcome to Admin Dashboard</h1>
</div>
<!--<div class="admindashboard" style="background-color:aqua;">
	<table>
		<tr>
			<td>1.</td><td><a href="addstudent.php">Add Student Details</a></td>
		</tr>
		<tr>
			<td>2.</td><td><a href="updatestudent.php">Update Student Details</a></td>
		</tr>
		<tr>
			<td>3.</td><td><a href="deletestudent.php">Delete Student Details</a></td>
		</tr>
	</table>
</div>-->
<div class="admindashboard">
		<ul>
			<li><a href="addstudent.php">Add Student Details</a></li>
			<li><a href="updatestudent.php">Update Student Details</a></li>
			<li><a href="deletestudent.php">Delete Student Details</a></li>
		</ul>
	</div>
</body>
</html>
