<?php
session_start();
if ($_SESSION['sm_staff']==TRUE && $_SESSION['level']=='1' || $_SESSION['level']=='2') {
  
?>

<!doctype html>
<html class="no-js" lang="en">

<?php include('inc/head.php');?>
<!-- modals CSS
        ============================================ -->
    <link rel="stylesheet" href="css/modals.css">
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

  <?php include('inc/left_bar.php');?>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
   <?php include('inc/top_bar.php');?>
   <style type="text/css">
       .breadcome-list{
        padding-bottom: 22px;
       }
   </style>
        <!-- <div class="section-admin container-fluid">
        
            <div class="row admin text-center">
                <div class="col-md-12">
                    <div class="row">
                        
                        
                      
                     
                    </div>
                </div>
            </div>
        </div> -->
 <?php

    if (isset($_GET['updated'])==1) {
        ?>

        <div class="alert alert-success alert-st-one" role="alert">
            <i class="fa fa-check adminpro-checked-pro admin-check-pro" aria-hidden="true"></i>
            <p class="message-mg-rt"><strong>Well done!</strong> Product Information Updated Sussessfully.</p>
        </div>
        <?php
    }else if (isset($_GET['exist'])==1) {
     ?>
     <div class="alert alert-danger alert-mg-b alert-st-four" role="alert">
        <i class="fa fa-window-close adminpro-danger-error admin-check-pro" aria-hidden="true"></i>
        <i class="fa fa-times adminpro-danger-error admin-check-pro" aria-hidden="true"></i>
        <p class="message-mg-rt"><strong>Oh snap!</strong> This Product May Be Exist.</p>
    </div>
    <?php
}else if (isset($_GET['error'])==1) {
     ?>
     <div class="alert alert-danger alert-mg-b alert-st-four" role="alert">
        <i class="fa fa-window-close adminpro-danger-error admin-check-pro" aria-hidden="true"></i>
        <i class="fa fa-times adminpro-danger-error admin-check-pro" aria-hidden="true"></i>
        <p class="message-mg-rt"><strong>Oh snap!</strong> Something Error.</p>
    </div>
    <?php
}else if (isset($_GET['deleted'])==1) {
     ?>
   <div class="alert alert-success alert-st-one" role="alert">
            <i class="fa fa-check adminpro-checked-pro admin-check-pro" aria-hidden="true"></i>
            <p class="message-mg-rt"><strong>Deleted!</strong> Product Information Deleted Sussessfully.</p>
        </div>
    <?php
}

?>




<!-- Static Table Start -->
        <div class="data-table-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Products <span class="table-project-n">List</span> </h1>
                                </div>
                                <div class="add-product">
                                <a href="purchase_h">Purchase History</a>
                            </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control">
                                                <option value="">Export Basic</option>
                                                <option value="all">Export All</option>
                                                <option value="selected">Export Selected</option>
                                            </select>
                                    </div>
                                 <!--  <img src="db/photo/AirFilter.jpg" width="50" height="50"> -->
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
    <thead>
        <tr>
            <th data-field="state" data-checkbox="true"></th>
            
            <th data-field="name" data-editable="true">Product Name</th>
            <th data-field="company" data-editable="true">Model</th>
            <th data-field="price" data-editable="true">Brand</th>
            <th data-field="date" data-editable="true">Country</th>
            <th data-field="task" data-editable="true">Vehicle</th>
            <th data-field="code" data-editable="true">Code</th>
            <th data-field="email" data-editable="true">Quantity</th>
            <th data-field="action">Purchase</th>
        </tr>
    </thead>
 <tbody>
                                           
<?php
include('db/db.php');
$query="select * from product WHERE p_id<>0";
$result=mysqli_query($con,$query);
//echo mysqli_error();
if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $id=$row['p_id'];
echo "<tr>";

echo "<td style='text-align: center'></td>"; 
echo "<td style='text-align: center'>".$row['name']."</td>"; 
echo "<td style='text-align: center'>".$row['model']."</td>";
echo "<td style='text-align: center'>".$row['brand']."</td>";
echo "<td style='text-align: center'>".$row['region']."</td>";
echo "<td style='text-align: center'>".$row['vehicle']."</td>";
echo "<td style='text-align: center'>".$row['code']."</td>";
echo "<td style='text-align: center'>".$row['quantity']."</td>";

echo "<td style='text-align: center'><a style='color:white; text-decoration: none;' href='purchase_input?add&id=".$row['p_id']."&name=".$row['name']."'><button class='btn btn-info'>Purchase</button></a></td>"; 
// echo "<td><a class='Danger danger-color' href='#'' data-toggle='modal' data-target='#DangerModalhdbgcl$id'>Details</a></td>";

echo "</tr>";
?>

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
        </div>
        <!-- Static Table End -->



<!-- <a href="delete.php?id=22" onclick = "if (! confirm('Are You Sure To Delete This?')) { return false; }">Delete</a> -->


  <script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>
       <!--  <div class="calender-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="calender-inner">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright &copy; <?php echo date('Y'); ?> Sonargoan Motors All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- jquery
        ============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- data table JS
        ============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
        ============================================ -->
    <script src="js/editable/jquery.mockjax.js"></script>
    <script src="js/editable/mock-active.js"></script>
    <script src="js/editable/select2.js"></script>
    <script src="js/editable/moment.min.js"></script>
    <script src="js/editable/bootstrap-datetimepicker.js"></script>
    <script src="js/editable/bootstrap-editable.js"></script>
    <script src="js/editable/xediable-active.js"></script>
    <!-- Chart JS
        ============================================ -->
    <script src="js/chart/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- tab JS
        ============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="js/main.js"></script>
</body>

</html>
<?PHP

}else{
    header('location:index');
}

?>