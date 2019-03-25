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

<div class="askadmin" align="center">
	<form action="deletestudent.php" method="post" enctype="multipart/form-data">
		<br><br>Name:<input type="text" name="name" placeholder="Enter name" required="required">&nbsp&nbsp
		Standard:<input type="number" name="std" placeholder="Enter standard" min="1" max="12" required="required">&nbsp&nbsp
		<input type="submit" name="submit" value="Search">
	</form>
</div>

<br><br><table align="center" width="80%" border="1px solid red">
	<tr style="background-color:black;color:white;">
		<th>Serial No</th>
		<th>Roll No</th>
		<th>Name</th>
		<th>City</th>
		<th>Parent Contact No</th>
		<th>Standard</th>
		<th>Image</th>
	</tr>
<?php
	if(isset($_POST["submit"])){
	include('../dbconn.php');
	$name=$_POST['name'];
	$std=$_POST['std'];
	$query="SELECT * FROM `student` WHERE `standard`='$std' AND `name` LIKE '%$name%'";
	$run=@mysqli_query($link,$query);
	if(@mysqli_num_rows($run)<1){
		?><tr><td colspan="7"><?php echo "No data Found!!";?>
		<?php
	}
	else{
		$count=0;
		while($data=@mysqli_fetch_assoc($run)){
			$count++;
			?>
			<tr>
				<td> <?php echo $count ?> </td>
				<td><?php echo $data["roll_no"]?></td>
				<td><?php echo $data["name"]?></td>
				<td><?php echo $data["city"]?></td>
				<td><?php echo $data["par_cont"]?></td>
				<td><?php echo $data["standard"]?></td>
				<td><img src="../dataimages/<?php echo $data["image"]?>" style="max-width:100px"></td>
				<td><a href="deleteform.php?sid=<?php echo $data["ID"]?>">Delete</a></td>
			</tr>
			<?php
		}	
	}
}?>
</table>
<?php
?>
