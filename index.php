<!doctype html>
<html lang="en_US">

<head>
	<meta charset="UTF-8">
	<title>My Webpage</title>
</head>

<body style="background-color:lightblue";>
	<h3 align="right" style="margin-right:20px;"><a href="login.php">Admin Login</a></h3>
	<h1><marquee>Welcome to Student Management System</marquee></h1>
	<p align="center" style="font-size:25px;">Enter the details below</p>
	<table align="center" width="30%" border="1" style="font-size:20px;">
		<form action="index.php" method="post">
		<tr>
			<td>Choose the standard:&nbsp</td>
			<td>
				<select name="std" required="required">
					<option value="1">1st</option>
					<option value="2">2nd</option>
					<option value="3">3rd</option>
					<option value="4">4th</option>
					<option value="5">5th</option>
					<option value="6">6th</option>
					<option value="7">7th</option>
					<option value="8">8th</option>
					<option value="9">9th</option>
					<option value="10">10th</option>
					<option value="11">11th</option>
					<option value="12">12th</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Enter the roll number:&nbsp
			</td>
			<td>
				<input type="text" name="roll_no" required="required">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="submit" value="Show Info">
			</td>
		</tr>
			
		</form>
	</table>
	
</body>

</html>


<?php
	if(isset($_POST["submit"])){
		?>
		<br><br><table align="center" width="80%" border="1px solid red">
		<tr style="background-color:black;color:white;">
		<th>Image</th>
		<th>Name</th>
		<th>Standard</th>
		<th>Roll No</th>
		<th>City</th>
		<th>Parent Contact No</th>
	</tr>
	<?php
	include('dbconn.php');
	$roll=$_POST['roll_no'];
	$st=$_POST['std'];
	$query="SELECT * FROM `student` WHERE `standard`='$st' AND `roll_no`='$roll'";
	$run=@mysqli_query($link,$query);
	if(@mysqli_num_rows($run)<1){
		?><tr><td colspan="7"><?php echo "No data Found!!";?>
		<?php
	}
	else{
		$data=@mysqli_fetch_assoc($run)
			?>
			<tr align="center">
				<td><img src="dataimages/<?php echo $data["image"]?>" style="max-width:100px"></td>
				<td><?php echo $data["name"]?></td>
				<td><?php echo $data["standard"]?></td>
				<td><?php echo $data["roll_no"]?></td>
				<td><?php echo $data["city"]?></td>
				<td><?php echo $data["par_cont"]?></td>
			</tr>
			<?php
	}
}?>
</table>
<?php
?>
