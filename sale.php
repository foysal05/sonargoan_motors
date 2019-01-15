<?php
session_start();
if ($_SESSION['sm_staff']==TRUE) {
  
?>

<!doctype html>
<html class="no-js" lang="en">

<?php include('inc/head.php');?>
<!-- DataTable Style -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
        
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

<style type="text/css">
    .text-danger strong {
            color: #9f181c;
        }
        .receipt-main {
            background: #ffffff none repeat scroll 0 0;
            border-bottom: 12px solid #333333;
            border-top: 12px solid #9f181c;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 40px 30px !important;
            position: relative;
            box-shadow: 0 1px 21px #acacac;
            color: #333333;
            font-family: open sans;
        }
        .receipt-main p {
            color: #333333;
            font-family: open sans;
            line-height: 1.42857;
        }
        .receipt-footer h1 {
            font-size: 15px;
            font-weight: 400 !important;
            margin: 0 !important;
        }
        .receipt-main::after {
            background: #414143 none repeat scroll 0 0;
            content: "";
            height: 5px;
            left: 0;
            position: absolute;
            right: 0;
            top: -13px;
        }
        .receipt-main thead {
            background: #414143 none repeat scroll 0 0;
        }
        .receipt-main thead th {
            color:#fff;
        }
        .receipt-right h5 {
            font-size: 16px;
            font-weight: bold;
            margin: 0 0 7px 0;
        }
        .receipt-right p {
            font-size: 12px;
            margin: 0px;
        }
        .receipt-right p i {
            text-align: center;
            width: 18px;
        }
        .receipt-main td {
            padding: 9px 20px !important;
        }
        .receipt-main th {
            padding: 13px 20px !important;
        }
        .receipt-main td {
            font-size: 13px;
            font-weight: initial !important;
        }
        .receipt-main td p:last-child {
            margin: 0;
            padding: 0;
        }   
        .receipt-main td h2 {
            font-size: 20px;
            font-weight: 900;
            margin: 0;
            text-transform: uppercase;
        }
        .receipt-header-mid .receipt-left h1 {
            font-weight: 100;
            margin: 34px 0 0;
            text-align: right;
            text-transform: uppercase;
        }
        .receipt-header-mid {
            margin: 24px 0;
            overflow: hidden;
        }
        
        #container {
            background-color: #dcdcdc;
        }
</style>


<!-- Static Table Start -->
        <div class="data-table-area mg-tb-15">
           <div class="container">
             <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h2>Product List</h2>
    <form action="con_sale" method="post">
 <table id="example3" class="display nowrap" >
            <thead>

              <tr style="text-align: center;">
                <th>#</th>
                <th>Code</th>
                <th>Name</th>
                <th>Model</th>
                <th>brnad</th>
                <th>Quantity</th>
                <th>Wholesale</th>
                <th>Retail</th>
                <!-- <th>Invoice</th> -->
              </tr>
            </thead>
            <tbody>

              <?php
              include('db/db.php');
              $query="select * from product";
      //echo $query;   

              $result=mysqli_query($con,$query);
                //echo mysqli_error();
              if(mysqli_num_rows($result)>0){

                while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                  echo "<tr>";
                  echo "<td style='text-align: center'><input type='checkbox' name='id[]' value='".$row['p_id']."'></td>"; 

                  echo "<td style='text-align: center'>".$row['code']."</td>"; 
                  echo "<td style='text-align: center'>".$row['name']."</td>"; 
                  echo "<td style='text-align: center'>".$row['brand']."</td>"; 
                  echo "<td style='text-align: center'>".$row['model']."</td>"; 
                  echo "<td style='text-align: center'>".$row['quantity']."</td>"; 
                  echo "<td style='text-align: center'>".$row['wholesale']."</td>"; 
                  echo "<td style='text-align: center'>".$row['retail']."</td>"; 
        


                  echo "</tr>";
                }
              }

              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th>#Code</th>
                <th>Name</th>
                <th>Model</th>
                <th>brnad</th>
                <th>Quantity</th>
                <th>Wholesale</th>
                <th>Retail</th>
              </tr>
            </tfoot>
          </table>
<div>
    <button type="submit" name="sale" class="btn btn-info btn-block" style="background-color: #C11A06">Sale</button>
</div>
</form>

</div>
        </div></div>
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

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script>

  $(document).ready(function() {
    $('#example').DataTable( {
      dom: 'Bfrtip',
      buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    } );
  } );
  $(document).ready(function() {
    $('#example2').DataTable( {
      dom: 'Bfrtip',
      buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    } );
  } );
  $(document).ready(function() {
    $('#example3').DataTable( {
      dom: 'Bfrtip',
      buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    } );
  } );
</script>




     <!-- jquery
        ============================================ -->
    <!-- <script src="js/vendor/jquery-1.11.3.min.js"></script> -->
    <!-- bootstrap JS
        ============================================ -->
 <!--    <script src="js/bootstrap.min.js"></script> -->
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
    header('location:sale?select=0');
}

?>