<?php
include ('db.php');
date_default_timezone_set('Asia/Dhaka');
session_start();
$payable=$_POST['payable'];
$total=$_POST['total'];
$less=$_POST['less'];
$ids=$_POST['id'];
$type=$_POST['type'];
$quantitys=$_POST['quantity'];
$staff_id=$_SESSION['uid'];
$date=date('m/d/Y');
$time=date('h:i:A');
foreach (array_combine($ids, $quantitys) as $id => $quantity) {
	$query="SELECT * FROM product WHERE p_id IN('$id')";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$old_quantity= $row['quantity'];
			$new_quantity=$old_quantity-$quantity;
		}
	}
	$sql="UPDATE product SET quantity='$new_quantity' WHERE p_id='$id'";
	$result=mysqli_query($con,$sql);
}
$query="SELECT  MAX(invoice_id) FROM sale ORDER BY s_id DESC";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$invoice=(int)$row['MAX(invoice_id)'];
		$new_invoice= $invoice+1;
	}
}
foreach (array_combine($ids, $quantitys) as $id => $quantity) {
	$query="INSERT INTO sale VALUES('','$new_invoice','$id','$quantity','$total','$less','$payable','$date','$time','$staff_id','$type')";
	$result=mysqli_query($con,$query);
	if ($result) {
		header('location:../sale_list?done');
	}else{
		header('location:../sale_list?ex');
	}

}
?>