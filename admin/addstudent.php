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
?>
<form action="addstudent.php" method="post" enctype="multipart/form-data">
	<table align="center" width=50% style="margin-top:50px;">
		<tr>
			<th>Roll No:&nbsp</th>
			<td><input type="text" name="rollno" placeholder="Enter roll no" required></td>
		</tr>
		<tr>
			<th>Name:&nbsp</th>
			<td><input type="text" name="name" placeholder="Enter name" required></td>
		</tr>
		<tr>
			<th>City:&nbsp</th>
			<td><input type="text" name="city" placeholder="Enter city" required></td>
		</tr>
		<tr>
			<th>Parent's Contact No:&nbsp</th>
			<td><input type="tel" name="pcon" placeholder="****12345678" required></td>
		</tr>
		<tr>
			<th>Standard:&nbsp</th>
			<td><input type="number" name="std" min="1" max="12" placeholder="Enter standard" required></td>
		</tr>
		<tr>
			<th>Image:&nbsp</th>
			<td><input type="file" name="image" required></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Submit" required></td>
		</tr>
	</table>
</form>
</body>
</html>

<?php
if(isset($_POST["submit"])){
	include('../dbconn.php');
	$rollno=$_POST['rollno'];
	$name=$_POST["name"];
	$city=$_POST["city"];
	$pcon=$_POST["pcon"];
	$std=$_POST["std"];
	
	$actualname=$_FILES['image']['name'];
	$tempname=$_FILES['image']['tmp_name'];
	move_uploaded_file($tempname,"../dataimages/$actualname");
	$query1="INSERT INTO `student`(`roll_no`, `name`, `city`, `par_cont`, `standard`, `image`) VALUES ('$rollno','$name','$city','$pcon','$std','$actualname')";
	$run1=@mysqli_query($link,$query1);
	if($run1){
?>
		<script> 
			alert('Data inserted successfully');
		</script>
<?php
	}
}
?>