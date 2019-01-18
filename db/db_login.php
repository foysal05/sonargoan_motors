<?php
include('db.php');
session_start();
if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password=mysqli_real_escape_string($con, $_POST['password']);
	$result=mysqli_query($con,"SELECT * FROM users where email='$email' and password='$password'");
		if ($row = mysqli_fetch_array($result)) {
		$_SESSION['uid']=$row['uid'];
		$_SESSION['name']=$row['name'];		
		$_SESSION['email']=$row['email'];
		$_SESSION['level']=$row['level'];
		$_SESSION['sm_staff']=TRUE;	
		header("Location:../index");
				
	}else{
		header("Location:../login/login?wrong=1");
	}

}
?>
