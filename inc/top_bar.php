     <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                         <i class="fa fa-bars"></i>
                                     </button>
                                 </div>
                             </div>
                             <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                <div class="header-top-menu tabl-d-n">
                                    <ul class="nav navbar-nav mai-top-nav">
                                        <?PHP
                                        if ($_SESSION['level']<>'3') {
                                         ?>


                                         <li class="nav-item"><a href="purchase" class="nav-link">Purchase</a>

                                         </li>
                                         <?php
                                     }
                                     ?>
                                        <li class="nav-item"><a href="sale" class="nav-link">Sale</a>
                                        </li>
                                         <?PHP
                                        if ($_SESSION['level']=='1') {
                                         ?>
                                        <li class="nav-item"><a href="staff_list" class="nav-link">Staff</a>
                                             <?php
                                     }
                                     ?>
                                        </li><li class="nav-item"><a>
                                   <?php 
                                   if ($_SESSION['level']=='1') {
                                       echo "<td><b>Login As: Admin</b></td>"; 
                                  }else if ($_SESSION['level']=='2') {
                                       echo "<td>Login As: Manager</td>"; 
                                  }else {
                                    echo "<td>Login As: Salesman</td>";

                                  }?>
                                      
                                  </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                   
                                        <li class="nav-item">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                               <i class="fa fa-user adminpro-user-rounded header-riht-inf" aria-hidden="true"></i>
                                               <span class="admin-name"><?php echo $_SESSION['name'];?></span>
                                               <i class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i>
                                           </a>
                                           <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                           
                                            <li><a href="logout"><span class="fa fa-lock author-log-ic"></span>Log Out</a>
                                            </li>
                                        </ul>
                                    </li>
  
     </ul>
 </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Mobile Menu start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="index.html">Dashboard v.1</a></li>
                                    <li><a href="index-1.html">Dashboard v.2</a></li>
                                    <li><a href="index-3.html">Dashboard v.3</a></li>
                                    <li><a href="product-list.html">Product List</a></li>
                                    <li><a href="product-edit.html">Product Edit</a></li>
                                    <li><a href="product-detail.html">Product Detail</a></li>
                                    <li><a href="product-cart.html">Product Cart</a></li>
                                    <li><a href="product-payment.html">Product Payment</a></li>
                                    <li><a href="analytics.html">Analytics</a></li>
                                    <li><a href="widgets.html">Widgets</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                <ul id="demo" class="collapse dropdown-header-top">
                                    <li><a href="mailbox.html">Inbox</a>
                                    </li>
                                    <li><a href="mailbox-view.html">View Mail</a>
                                    </li>
                                    <li><a href="mailbox-compose.html">Compose Mail</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#others" href="#">Miscellaneous <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                <ul id="others" class="collapse dropdown-header-top">
                                    <li><a href="file-manager.html">File Manager</a></li>
                                    <li><a href="contacts.html">Contacts Client</a></li>
                                    <li><a href="projects.html">Project</a></li>
                                    <li><a href="project-details.html">Project Details</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                    <li><a href="404.html">404 Page</a></li>
                                    <li><a href="500.html">500 Page</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Interface <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                    <li><a href="google-map.html">Google Map</a>
                                    </li>
                                    <li><a href="data-maps.html">Data Maps</a>
                                    </li>
                                    <li><a href="pdf-viewer.html">Pdf Viewer</a>
                                    </li>
                                    <li><a href="x-editable.html">X-Editable</a>
                                    </li>
                                    <li><a href="code-editor.html">Code Editor</a>
                                    </li>
                                    <li><a href="tree-view.html">Tree View</a>
                                    </li>
                                    <li><a href="preloader.html">Preloader</a>
                                    </li>
                                    <li><a href="images-cropper.html">Images Cropper</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Charts <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                <ul id="Chartsmob" class="collapse dropdown-header-top">
                                    <li><a href="bar-charts.html">Bar Charts</a>
                                    </li>
                                    <li><a href="line-charts.html">Line Charts</a>
                                    </li>
                                    <li><a href="area-charts.html">Area Charts</a>
                                    </li>
                                    <li><a href="rounded-chart.html">Rounded Charts</a>
                                    </li>
                                    <li><a href="c3.html">C3 Charts</a>
                                    </li>
                                    <li><a href="sparkline.html">Sparkline Charts</a>
                                    </li>
                                    <li><a href="peity.html">Peity Charts</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Tables <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                <ul id="Tablesmob" class="collapse dropdown-header-top">
                                    <li><a href="static-table.html">Static Table</a>
                                    </li>
                                    <li><a href="data-table.html">Data Table</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#formsmob" href="#">Forms <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                <ul id="formsmob" class="collapse dropdown-header-top">
                                    <li><a href="basic-form-element.html">Basic Form Elements</a>
                                    </li>
                                    <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                    </li>
                                    <li><a href="password-meter.html">Password Meter</a>
                                    </li>
                                    <li><a href="multi-upload.html">Multi Upload</a>
                                    </li>
                                    <li><a href="tinymc.html">Text Editor</a>
                                    </li>
                                    <li><a href="dual-list-box.html">Dual List Box</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Appviewsmob" href="#">App views <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                <ul id="Appviewsmob" class="collapse dropdown-header-top">
                                    <li><a href="basic-form-element.html">Basic Form Elements</a>
                                    </li>
                                    <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                    </li>
                                    <li><a href="password-meter.html">Password Meter</a>
                                    </li>
                                    <li><a href="multi-upload.html">Multi Upload</a>
                                    </li>
                                    <li><a href="tinymc.html">Text Editor</a>
                                    </li>
                                    <li><a href="dual-list-box.html">Dual List Box</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                <ul id="Pagemob" class="collapse dropdown-header-top">
                                    <li><a href="login.html">Login</a>
                                    </li>
                                    <li><a href="register.html">Register</a>
                                    </li>
                                    <li><a href="lock.html">Lock</a>
                                    </li>
                                    <li><a href="password-recovery.html">Password Recovery</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu end -->
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcome-heading">
                               <!--  <form role="search" class="">
                                    <input type="text" placeholder="Search..." class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                                </form> -->
                            </div>
                                            <!-- <div style="font-size: 2em; color: white;">

                                        <script>
                                          var currentDate = new Date(),
                                          day = currentDate.getDate(),
                                          month = currentDate.getMonth() + 1,
                                          year = currentDate.getFullYear();
                                          document.write(day + "/" + month + "/" + year)
                                      </script>
                                      --
                                      <script>
                                        var currentTime = new Date(),
                                        hours = currentTime.getHours(),
                                        minutes = currentTime.getMinutes();

                                        if (minutes < 10) {
                                           minutes = "0" + minutes;
                                       }

                                       var suffix = "AM";
                                       if (hours >= 12) {
                                        suffix = "PM";
                                        hours = hours - 12;
                                    }
                                    if (hours == 0) {
                                       hours = 12;
                                   }

                                   document.write(hours + ":" + minutes + " " + suffix)
                               </script>
                           </div> -->
                       </div>

                       <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <ul class="breadcome-menu">
                            <li>
           <span style="font-size: 2em" id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>


            <span class="bread-slash"></span>
        </li>
        <!-- <li><span class="bread-blod">Dashboard</span> -->
        </li>
    </ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>