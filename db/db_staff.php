<?php
include('db.php');


if (isset($_POST['add_staff'])) {
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$cpass=$_POST['cpass'];
	$type=$_POST['type'];

	$sql="SELECT email FROM users WHERE email='$email'";
	$result=mysqli_query($con,$sql);
	$num=mysqli_num_rows($result);
	if($num==0){


$query="INSERT INTO users VALUES('','$name','$email','$phone','$cpass','$type')";
$result=mysqli_query($con,$query);
if ($result) {
	header('location:../staff_list?added');
}else{
	header('location:../staff_list?error');
}

	}else {
		header('location:../staff?exist');
	}

}

if (isset($_POST['update_staff'])) {
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$cpass=$_POST['cpass'];
	$type=$_POST['type'];
	$id=$_POST['id'];

	$sql="SELECT email FROM users WHERE email='$email' AND uid<>'$id'";
	$result=mysqli_query($con,$sql);
	$num=mysqli_num_rows($result);
	if($num==0){


$query="UPDATE users SET name='$name',phone='$phone',email='$email',password='$cpass', level='$type' WHERE uid='$id' ";
$result=mysqli_query($con,$query);
if ($result) {
	header('location:../staff_list?updated');
}else{
	header('location:../staff_list?error');
}

	}else {
		header('location:../staff_list?exist');
	}

}

if (isset($_GET['delete'])) {
	$id=$_GET['id'];
	$query="DELETE FROM users WHERE uid='$id'";
	$result=mysqli_query($con,$query);
	if ($result) {
		header('location:../staff_list?deleted');
	}else{
		header('location:../staff_list?ex');
	}
}

?>