<?php
session_start();
if ($_SESSION['sm_staff']==TRUE && $_SESSION['level']=='1' || $_SESSION['level']=='2') {
  
?>

<!doctype html>
<html class="no-js" lang="en">

<?php include('inc/head.php');?>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#datepickerF" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#datepickerT" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>
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
   
 <?php

    if (isset($_GET['done'])==1) {
        ?>

        <div class="alert alert-success alert-st-one" role="alert">
            <i class="fa fa-check adminpro-checked-pro admin-check-pro" aria-hidden="true"></i>
            <p class="message-mg-rt"><strong>Well done!</strong> Product Sales Are Completed Successfully
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
                                    <h1>Sale <span class="table-project-n">History</span> </h1>
                                </div>
                                <div class="add-product">
<script type="text/javascript">
    function validateForm() {
  var start = document.forms["myForm"]["start"].value;
  var end = document.forms["myForm"]["end"].value;
  
  if (start == "") {
    alert("Please Select Start Date");
    return false;
  }else if (end == "") {
    alert("Please Select End Date");
    return false;
  }
}
</script>
                                <!-- <a href="sale">New Sale</a> -->
<form action="" method="post" name="myForm" onsubmit="return validateForm()">

<!-- =============================================== -->
<div class="sparkline16-graph">
    <div class="date-picker-inner">
        <div class="form-group data-custon-pick data-custom-mg" id="data_5">
            <label>Range Date select</label>
            <div class="input-daterange input-group" id="datepicker">
                <input type="text" class="form-control" required="" name="start" value="<?php echo date('m/d/Y');?>" />
                <span class="input-group-addon">TO</span>
                <input type="text" class="form-control" required="" name="end" value="<?php echo date('m/d/Y');?>" />
            </div>
        </div>
    </div>
</div>
<br>
<div class="input-group mg-b-pro-edt">
<!-- <span class="input-group-addon"><i class="fa fa-edit" aria-hidden="true"></i></span> -->
<button type="submit" name="get" style="background-color: #BF1906" class="btn btn-info">Get Report</button>
</div>
 </form>
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
            
            <th data-field="#" data-editable="true">Invoice ID</th>
            <th data-field="name" data-editable="true">Product Name</th>
            <th data-field="company" data-editable="true">Model</th>
            <th data-field="price" data-editable="true">Quantity</th>
            <th data-field="amount" data-editable="true">Amount</th>
            
            <th data-field="email" data-editable="true">Date</th>
            <th data-field="time" data-editable="true">Time</th>
            <th data-field="action">Type</th>
        </tr>
    </thead>
 <tbody>
                                           
<?php
include('db/db.php');
if (isset($_POST['get'])) {
$start=$_POST['start'];
$end=$_POST['end'];
  $query="select * from sale,product WHERE item_id=p_id AND time BETWEEN '$start' AND '$end'  ORDER BY invoice_id DESC ";  
}else{
    $query="select * from sale,product WHERE item_id=p_id ORDER BY invoice_id DESC ";
}
//$query="select * from sale,product WHERE item_id=p_id ORDER BY invoice_id DESC ";
$result=mysqli_query($con,$query);
//echo mysqli_error();
if(mysqli_num_rows($result)>0){
$total=0;
while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $id=$row['p_id'];
    $total+=$row['payable_amount'];
echo "<tr>";

echo "<td style='text-align: center'></td>"; 
echo "<td style='text-align: center'>".$row['invoice_id']."</td>"; 
echo "<td style='text-align: center'>".$row['name']."</td>"; 
echo "<td style='text-align: center'>".$row['model']."</td>";
echo "<td style='text-align: center'>".$row['s_quantity']."</td>";
echo "<td style='text-align: center'>".$row['payable_amount']."</td>";
echo "<td style='text-align: center'>".$row['date']."</td>";
echo "<td style='text-align: center'>".$row['time']."</td>";
// echo "<td style='text-align: center'>".$row['code']."</td>";
if ($row['type']=='1') {
  echo "<td style='text-align: center'>Retail</td>";
}else{
    echo "<td style='text-align: center'>Whole Sale</td>";
}
 

 
// echo "<td><a class='Danger danger-color' href='#'' data-toggle='modal' data-target='#DangerModalhdbgcl$id'>Details</a></td>";

echo "</tr>";
?>

<?php

}
}

?>

                                        </tbody>
                                        
                                    </table>
                                    <h3>Total Amount : <?php echo " ".$total."/= BDT";?></h3>
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
   <!-- datapicker JS
        ============================================ -->
    <script src="js/datapicker/bootstrap-datepicker.js"></script>
    <script src="js/datapicker/datepicker-active.js"></script>
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