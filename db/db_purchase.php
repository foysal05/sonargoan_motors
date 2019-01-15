<?php
include('db.php');
date_default_timezone_set('Asia/Dhaka');

if (isset($_POST['purchase_product'])) {
	

	$id=$_POST['id'];
	$unit_price=floatval($_POST['unit_price']);
	$quantity=$_POST['quantity'];
	$total_price=$_POST['total_price'];
	$date=date('m/d/Y');
	$time=date('h:i:A');

	$query="INSERT INTO purchase VALUES('','$id','$quantity','$unit_price','$total_price','$date','$time')";
	//echo $query;
	$result=mysqli_query($con,$query);
	
							$sql="SELECT * FROM product WHERE p_id='$id'";
							$result2=mysqli_query($con,$sql);
						//echo mysqli_error();
							if(mysqli_num_rows($result2)>0){

								while($row=mysqli_fetch_array($result2, MYSQLI_ASSOC)){
									$old_quantity=$row['quantity'];
									//echo $old_quantity;

								}
							}
	$new_quantity=$quantity+$old_quantity;
	//echo $new_quantity;

	$sql2="UPDATE product SET quantity='$new_quantity' WHERE p_id='$id'";
	//echo $query;
	$sqlresult=mysqli_query($con,$sql2);
	$result;
	if ($result) {
		header('location:../purchase_h?added');
		//echo "Purchase Added";
		# code...
	}else{
		header('location:../purchase?error');
		//echo "Purchase Error";
	}
}


?>