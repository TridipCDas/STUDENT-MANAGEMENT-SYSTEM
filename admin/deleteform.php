<?php
session_start();
if(isset($_SESSION['userid'])){
	echo "";
}
else{
	?>
	<script> alert('Admin login is required!!');</script>
	<?php
	header('location:../login.php');
}
?>
<?php
include('header.php');
include('titleheader.php');
include('../dbconn.php');

$sid=$_GET['sid'];
$query="DELETE FROM `student` WHERE `ID`='$sid'";
$run=@mysqli_query($link,$query);
?>
<script>
	alert('Data deleted successfully')
	window.open('deletestudent.php','_self');
</script>
<?php ?>