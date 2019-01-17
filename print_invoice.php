<!DOCTYPE html>
<html>
<head>
    <title>Sonargaon Motors</title>
</head>
<body>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
    .invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>
<div class="container">
    <button onclick="myFunction()">Print</button>

    <script>
        function myFunction() {
          window.print();
      }
  </script>
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>Sonargaon Motors</h2><h3 class="pull-right">Invoice ID # <?php echo $_GET['id']; ?></h3>
                <img src="img/logo/logo.png">
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                   <!--  <address>
                    <strong>Billed To:</strong><br>
                        John Smith<br>
                        1234 Main<br>
                        Apt. 4B<br>
                        Springfield, ST 54321
                    </address> -->
                </div>
                <div class="col-xs-6 text-right">
                    <!-- <address>
                    <strong>Shipped To:</strong><br>
                        Jane Smith<br>
                        1234 Main<br>
                        Apt. 4B<br>
                        Springfield, ST 54321
                    </address> -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <!-- <address>
                        <strong>Payment Method:</strong><br>
                        Visa ending **** 4242<br>
                        jsmith@email.com
                    </address> -->
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Order Date:</strong><br>
                        <?php echo $_GET['date']; ?><br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Sale summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong></strong></td>
                                    <td><strong>Item</strong></td>
                                    <td></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <?php
                                include 'db/db.php';
                                $query="SELECT  * FROM sale,product WHERE item_id=p_id AND invoice_id='".$_GET['id']."'";
                                $result=mysqli_query($con,$query);
//echo mysqli_error();
                                if(mysqli_num_rows($result)>0){

                                    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){

                                        ?>
                                        <tr>
            <td></td>
            <td><?php echo $row['name'];?></td>
            <td></td>
            <td class="text-center"><?php echo $row['s_quantity'];?></td>

                                        </tr>
                                        <?php

                                    }
                                }
                                $query="SELECT DISTINCT total_cost,less,payable_amount FROM sale WHERE invoice_id='".$_GET['id']."'";
                                $result=mysqli_query($con,$query);
//echo mysqli_error();
                                if(mysqli_num_rows($result)>0){

                                    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                ?>

                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Total Cost</strong></td>
                                    <td class="thick-line text-right"><?php echo $row['total_cost'];?></td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Less</strong></td>
                                    <td class="no-line text-right"><?php echo $row['less'];?></td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Paid</strong></td>
                                    <td class="no-line text-right"><?php echo $row['payable_amount'];?></td>
                                </tr>

                                <?php
                            }
                        }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>