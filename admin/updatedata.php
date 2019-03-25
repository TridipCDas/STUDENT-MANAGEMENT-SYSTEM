<?php

include('../dbconn.php');
	$rollno=$_POST['rollno'];
	$name=$_POST["name"];
	$city=$_POST["city"];
	$pcon=$_POST["pcon"];
	$std=$_POST["std"];
	$id=$_POST["sid"];
	
	$actualname=$_FILES['image']['name'];
	$tempname=$_FILES['image']['tmp_name'];
	move_uploaded_file($tempname,"../dataimages/$actualname");
	$query1="UPDATE `student` SET `roll_no`='$rollno',`name`='$name',`city`='$city',`par_cont`='$pcon',`standard`='$std',`image`='$actualname' WHERE `ID`='$id'";
	$run1=@mysqli_query($link,$query1);
	if($run1){
?>
		<script> 
			alert('Data updated successfully');
			window.open('updateform.php?sid=<?php echo $id;?>','_self');
 		</script>
<?php
	}
?>