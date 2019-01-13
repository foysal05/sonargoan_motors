<?php

include('db.php');


$product_name=$_POST['name'];
$model=$_POST['model'];
$brand=$_POST['brand'];
$region=$_POST['region'];
$vehicle=$_POST['vehicle'];
$code=$_POST['code'];

$sql="SELECT model,brand FROM product WHERE model='$model' AND brand='$brand'";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);
if($num==0){

	$name =str_replace(" ","_",$_FILES['parts_photo'] ['name']);
	$temp=$_FILES['parts_photo'] ['tmp_name'];
	move_uploaded_file($temp,"photo/".$name);
	$path="photo/$name";

	$query="INSERT INTO product VALUES('','$product_name','$model','$brand','$region','$vehicle','$code','0','0','$path')";
	$result=mysqli_query($con,$query);
	if ($result) {
		header('location:../product_m?added=1');
	}else{
	//echo mysql_error();
		header('location:../product_m?added=0');
	}



}else{
	header('location:../product_m?exist=1');
	//echo "exist";
}


?>