<?php

include('db.php');

if (isset($_POST['add_product'])) {


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

}

if (isset($_POST['update_product'])) {
	


	$product_name=$_POST['name'];
	$model=$_POST['model'];
	$brand=$_POST['brand'];
	$region=$_POST['region'];
	$vehicle=$_POST['vehicle'];
	$code=$_POST['code'];
	$id=$_POST['id'];
	$retail=$_POST['retail'];
	$wholesale=$_POST['wholesale'];

	$sql="SELECT * FROM product WHERE model='$model' AND brand='$brand' AND p_id='$id'";
	$result=mysqli_query($con,$sql);
	$num=mysqli_num_rows($result);
	if($num==1){

		if ($_POST['parts_photo']=='') {

			$path=$_POST['old_photo'];
		}else{
			$name =str_replace(" ","_",$_FILES['parts_photo'] ['name']);
			$temp=$_FILES['parts_photo'] ['tmp_name'];
			move_uploaded_file($temp,"photo/".$name);
			$path="photo/$name";
		}

		$query="UPDATE product SET name='$product_name',model='$model',brand='$brand',region='$region',vehicle='$vehicle',code='$code',retail='$retail',wholesale='$wholesale',photo='$path' WHERE p_id='$id'";
		//echo $query;
		$result=mysqli_query($con,$query);
		if ($result) {

			//echo "Updated";
			header('location:../product-list?updated=1');
		}else{
			//echo "Error";
			header('location:../product-list?error');
		}



	}else{
		header('location:../product-list?exist=1');
		// echo $sql;
		// echo "exist";
	}




}
if (isset($_GET['delete'])) {
	$id=$_GET['id'];
	$query="DELETE FROM product WHERE p_id='$id'";
	$result=mysqli_query($con,$query);
	if ($result) {
		header('location:../product-list?deleted');
	}else{
		header('location:../product-list?error');
	}
}

?>