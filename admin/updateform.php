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
$query="SELECT * FROM `student` WHERE `ID`='$sid'";
$run=@mysqli_query($link,$query);
$data=@mysqli_fetch_assoc($run);
?>

<form action="updatedata.php" method="post" enctype="multipart/form-data">
	<table align="center" width=50% style="margin-top:50px;">
		<tr>
			<th>Roll No:&nbsp</th>
			<td><input type="text" name="rollno" value=<?php echo $data["roll_no"];?> required></td>
		</tr>
		<tr>
			<th>Name:&nbsp</th>
			<td><input type="text" name="name" value=<?php echo $data["name"];?> required></td>
		</tr>
		<tr>
			<th>City:&nbsp</th>
			<td><input type="text" name="city" value=<?php echo $data["city"];?> required></td>
		</tr>
		<tr>
			<th>Parent's Contact No:&nbsp</th>
			<td><input type="tel" name="pcon" value=<?php echo $data["par_cont"];?> required></td>
		</tr>
		<tr>
			<th>Standard:&nbsp</th>
			<td><input type="number" name="std" min="1" max="12" value=<?php echo $data["standard"];?> required></td>
		</tr>
		<tr>
			<th>Image:&nbsp</th>
			<td><input type="file" name="image" required></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
			<input type="hidden" name="sid" value=<?php echo $data["ID"];?>>
			<input type="submit" name="submit" value="Submit" required></td>
		</tr>
	</table>
</form>
</body>
</html>