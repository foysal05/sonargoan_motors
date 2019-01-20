<?php
session_start();
if ($_SESSION['sm_staff']==TRUE && $_SESSION['level']=='1' || $_SESSION['level']=='2') {
  
?>

<!doctype html>
<html class="no-js" lang="en">
<!-- dropzone CSS
        ============================================ -->
    <link rel="stylesheet" href="css/dropzone/dropzone.css">
<?php include('inc/head.php');?>
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
                        <a href="index"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
   <?php include('inc/top_bar.php');?>
        



  
       <!-- Single pro tab start-->
        <div class="single-product-tab-area mg-tb-15">
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-tab-pro-inner">
    <?php

    if (isset($_GET['added'])==1) {
        ?>

        <div class="alert alert-success alert-st-one" role="alert">
            <i class="fa fa-check adminpro-checked-pro admin-check-pro" aria-hidden="true"></i>
            <p class="message-mg-rt"><strong>Well done!</strong> Product Information Added Sussessfully.</p>
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
}

?>
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="fa fa-pencil" aria-hidden="true"></i> Product Purchase Information</a></li>
                                    <!-- <li><a href="#reviews"><i class="fa fa-ticket" aria-hidden="true"></i> Pictures</a></li> -->
                                   <!--  <li><a href="#INFORMATION"><i class="fa fa-briefcase" aria-hidden="true"></i> Brand</a></li> -->
                                </ul>
<div id="myTabContent" class="tab-content custom-product-edit">
<div class="product-tab-list tab-pane fade active in" id="description">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="review-content-section">
    <form action="db/db_purchase.php" method="post" enctype="multipart/form-data">
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-cog" aria-hidden="true"></i></span>
<input type="text" readonly="" value="<?php echo $_GET['name'];?>"  class="form-control" required="" min="0"  name="product"   placeholder="Name">
</div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><b>Q</b></span>
<input type="number" onkeypress="return isNumberKey(event)" class="form-control" required="" min="0"  name="quantity" id="quantity" onchange="myFunction()" placeholder="Quantity">
</div>

<input type="hidden" readonly="" value="<?php echo $_GET['id'];?>"  class="form-control" required="" min="0"  name="id"   placeholder="Name">


</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="review-content-section">
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><b style="color: green">U</b></span>
<input type="text" class="form-control" required="" id="price" name="unit_price" onkeypress="return isNumberKey(event)" placeholder="Unit Price">
</div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><b style="color: green">T</b></span>
<input type="text" class="form-control" required="" name="total_price" onkeypress="return isNumberKey(event)" readonly="" id="total_cost" placeholder="Total Price">
</div>

<script type="text/javascript">
  function myFunction(){

    var price =document.getElementById('price').value;
    var quantity =document.getElementById('quantity').value;

    var cal=price*quantity;
    document.getElementById('total_cost').value=parseInt(cal);
    //document.getElementById('paid').max=parseInt(cal);
    //document.getElementById('paid').min=parseInt(cal);
 
    
  }
</script>


</div>
</div>
</div>

<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="text-center mg-b-pro-edt custom-pro-edt-ds">
           
                <button type="submit" name="purchase_product" class="btn btn-primary waves-effect waves-light m-r-10">Purchase
                </button>
               
<!-- <button type="reset" name="" class="btn btn-info  m-r-10">Reset
</button> -->


</div>
</div>
</div>
</form>
</div>
<!-- <div class="product-tab-list tab-pane fade" id="reviews">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="review-content-section">
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
<input type="text" class="form-control" placeholder="First Name">
</div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
<input type="text" class="form-control" placeholder="Product Title">
</div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
<input type="text" class="form-control" placeholder="Regular Price">
</div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
<input type="text" class="form-control" placeholder="Tax">
</div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
<input type="text" class="form-control" placeholder="Quantity">
</div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="review-content-section">
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
<input type="text" class="form-control" placeholder="Last Name">
</div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-ticket" aria-hidden="true"></i></span>
<input type="text" class="form-control" placeholder="Product Description">
</div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
<input type="text" class="form-control" placeholder="Sale Price">
</div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-tag" aria-hidden="true"></i></span>
<input type="text" class="form-control" placeholder="Category">
</div>
<select name="select" class="form-control pro-edt-select form-control-primary">
    <option value="opt1">Select One Value Only</option>
    <option value="opt2">2</option>
    <option value="opt3">3</option>
    <option value="opt4">4</option>
    <option value="opt5">5</option>
    <option value="opt6">6</option>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="text-center mg-b-pro-edt custom-pro-edt-ds">
<button type="button" class="btn btn-primary waves-effect waves-light m-r-10">Save
</button>
<button type="button" class="btn btn-warning waves-effect waves-light">Discard
</button>
</div>
</div>
</div>
</div> -->
<!-- <div class="product-tab-list tab-pane fade" id="INFORMATION">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
<div class="review-content-section">
<div class="card-block">

        <div class="input-group mg-b-6 mg-t-6">
            <span class="input-group-addon"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
            <input type="text" class="form-control" name="brand_name" placeholder="Brand Name">
        </div>
        <br>
        <div class="input-group mg-b-6">
            <span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
            
            <select class="form-control" name="brand_type">
                <option value="">Please Select</option>
                <option value="Car">Car</option>
                <option value="Bike">Bike</option>
            </select>
        </div>
                                                      
                                                        <br>
                                                        <div class="form-group review-pro-edt">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit
                                                                </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="sparkline8-list">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Brand List</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="static-table-list">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                
                                                <th>Brand Name</th>
                                                <th>Brand Type</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Mamun</td>
                                                <td>Roshid</td>
                                                <td>@Facebook</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Suhag</td>
                                                <td>Khan</td>
                                                <td>@Twitter</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Sakil</td>
                                                <td>Shak</td>
                                                <td>@Linkedin</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <!-- morrisjs JS
		============================================ -->
    <script src="js/morrisjs/raphael-min.js"></script>
    <script src="js/morrisjs/morris.js"></script>
    <script src="js/morrisjs/morris-active.js"></script>
<!-- dropzone JS
        ============================================ -->
    <script src="js/dropzone/dropzone.js"></script>
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