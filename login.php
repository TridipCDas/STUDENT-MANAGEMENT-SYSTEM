<?php
session_start();
if(isset($_SESSION['userid'])){
	header('location:Admin/admindashboard.php');
}
?>
<!doctype html>
<html lang="en_US">

<head>
	<meta charset="UTF-8">
	<title>My Webpage</title>
</head>
<body style="background-color:aqua";>
	<h1 align="center">Admin Login</h1>
	<table align="center">
		<form action="login.php" method="post">
			<tr>
				<td>Username:&nbsp </td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password:&nbsp </td>
				<td><input type="password" name="password"></td>
			</tr>
			<td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
		</form>
	</table>

</body>
</html>

<?php
include('dbconn.php');
if(isset($_POST["login"])){
	$Username=$_POST["username"];
	$Password=$_POST["password"];
	
	$query="SELECT * FROM `admin`";
	$run=@mysqli_query($link,$query);
	$data=@mysqli_fetch_assoc($run);
	if($data["username"]===$Username && $data["password"]===$Password){
		$id=$data["ID"];
		
		$_SESSION['userid']=$id;
		header('location:Admin/admindashboard.php');
	}
	else{
	?>
		<script>
			alert('Username or Passsword didnot match!!');
			window.open('login.php','_self');
		</script>
	<?php
	}
}
?>