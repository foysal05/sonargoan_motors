<?php
session_start();
if ($_SESSION['sm_staff']==TRUE && $_SESSION['level']=='1') {
  
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
                                        <p class="message-mg-rt"><strong>Oh snap!</strong> This Email May Be Exist.</p>
                                    </div>
                                    <?php
                                }

                                ?>
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="fa fa-pencil" aria-hidden="true"></i> Add/Modify Staff Information</a></li>
                                    <?php
                                    if (isset($_GET['id'])) {
                                     include('db/db.php');
                                     $query="SELECT * FROM users WHERE uid ='".$_GET['id']."'";
                                     $id=$_GET['id'];
      //echo $query;   

                                     $result=mysqli_query($con,$query);
                //echo mysqli_error();
                                     if(mysqli_num_rows($result)>0){

                                        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                            $name=$row['name'];
                                            $phone=$row['phone'];
                                            $email=$row['email'];
                                            $password=$row['password'];
                                            $level=$row['level'];

                                        }
                                    }
                                }


                                ?>
                            </ul>
                            <div class="add-product">
                                <a href="staff_list">Staff List</a>
                            </div>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <form action="db/db_staff.php" method="post" enctype="multipart/form-data">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" required="" value="<?php if(isset($_GET['id'])){echo $name;} ?>" name="name" placeholder="Full Name">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" required="" value="<?php if(isset($_GET['id'])){echo $phone;} ?>" onkeypress="return isNumberKey(event)" name="phone" placeholder="Phone">
                                                    </div>

                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                                        <input type="email" class="form-control" required="" value="<?php if(isset($_GET['id'])){echo $email;} ?>" name="email" placeholder="Email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                                                        <input type="password" class="form-control" required="" value="<?php if(isset($_GET['id'])){echo $password;} ?>" name="pass" id="pass1" placeholder="Password">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                                                        <input type="password" class="form-control" required="" value="<?php if(isset($_GET['id'])){echo $password;} ?>" name="cpass" id="pass2" onkeyup="checkPass(); return false;" placeholder="Confirm Password">
                                                        <span id="confirmMessage" class="confirmMessage"></span>
                                                    </div>

                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></span>
                                                        <select class="form-control" required="" name="type">
                                                            <option value="">Select Staff Type</option>
                                                            <?php
                                                            if (!isset($_GET['id'])) {
                                                                ?>
                                                                <option value="1">Admin</option>
                                                                <option value="2">Manager</option>
                                                                <option value="3">Salesman</option>
                                                                <?php
    # code...
                                                            }else{
                                                              ?>
                                                              <option value="1" <?php if($_GET['level']==1){echo "selected";} ?>>Admin</option>
                                                              <option value="2" <?php if($_GET['level']==2){echo "selected";} ?>>Manager</option>
                                                              <option value="3" <?php if($_GET['level']==3){echo "selected";} ?>>Salesman</option>
                                                              <?php
                                                          }
                                                          ?>
                                                      </select>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="row">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-center mg-b-pro-edt custom-pro-edt-ds">
                                                <?php
                                                if (!isset($_GET['update'])) {
                                                    ?>
                                                    <button type="submit" disabled="" name="add_staff" id="add_staff" class="btn btn-primary waves-effect waves-light m-r-10">Save
                                                    </button>
                                                    <?php

                                                }
                                                ?>
<!-- <button type="reset" name="" class="btn btn-info  m-r-10">Reset
</button> -->
<?php
if (isset($_GET['update'])) {
   ?>
   <input type="hidden" name="id" value="<?php echo $id; ?>">
   <button type="submit" name="update_staff" id="update_staff"  class="btn btn-primary waves-effect waves-light m-r-10">Update
   </button>

   <?php
}

?>

</div>
</div>
</div>
</form>
</div>
<script type="text/javascript">
    function checkPass()
    {
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var add_staff = document.getElementById('add_staff');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
        document.getElementById("add_staff").disabled = false; 
        document.getElementById("update_staff").disabled = false;
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!";
        document.getElementById("add_staff").disabled = true;
        document.getElementById("update_staff").disabled = true;
        //return false;
    }
}  
</script>
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