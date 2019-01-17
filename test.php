<?php
include ('db/db.php');
$query="SELECT  MAX(invoice_id) FROM sale ORDER BY s_id DESC";
$result=mysqli_query($con,$query);
//echo mysqli_error();
$invoice=0;
if(mysqli_num_rows($result)>0){

    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){

$invoice=(int)$row['MAX(invoice_id)'];
        $new_invoice= $invoice+1;
        echo $new_invoice;

    }
}

?>