<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon --><b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                    <!-- Light Logo text -->
                         <img src="/assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-view-grid"></i></a>
                    <div class="dropdown-menu scale-up-left">

                        <ul class="mega-dropdown-menu row">
                            <li class="col-lg-12 col-xlg-12 m-b-20">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="mdi mdi-barcode"></i></div>
                                    <input type="text" class="form-control" name="barcode_check" id="input_barcode_check" placeholder="บาร์โค้ด" ng-model="barcode" ng-keyup="$event.keyCode == 13 && getProductInfo()">
                                    <span class="input-group-btn">
                                <button ng-click="getProductInfo()"   class="btn waves-effect waves-light btn-success">ตรวจสอบ</button>
                            </span>
                                </div>
                            </li>

                            <li class="col-lg-3 col-xlg-2 m-b-30">
                                <h4 class="m-b-20">รูปสินค้า</h4>
                                <!-- CAROUSEL -->
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <img ng-src="<% product.image %>" src="/assets/images/no-image.png" width="100%">
                                </div>
                                <!-- End CAROUSEL -->
                            </li>
                            <li class="col-lg-6 m-b-30">
                                <h4 class="m-b-20">ข้อมูลสินค้า</h4>
                                <table class="table m-t-10">
                                    <tbody>
                                    <tr>
                                        <td width="100px" bgcolor="#d3d3d3"><b>ชื่อสินค้า</b></td>
                                        <td><% product.product_name %></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#d3d3d3">หมวดหมู่</td>
                                        <td><% product.cate_name %></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#d3d3d3">ยี่ห้อ</td>
                                        <td><% product.brand_name %></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#d3d3d3">รุ่น</td>
                                        <td><% product.model %></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#d3d3d3">ราคา</td>
                                        <td><% product.price %></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#d3d3d3">รายละเอียด</td>
                                        <td><% product.description %></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li class="col-lg-3 col-xlg-4 m-b-30">
                                <h4 class="m-b-20">List style</h4>
                                <!-- List style -->
                                <ul class="list-style-none">
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">

                <!-- ============================================================== -->
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/assets/images/users/1.jpg" alt="user" class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="/assets/images/users/1.jpg" alt="user"></div>
                                    <div class="u-text">
                                        <h4>Steave Jobs</h4>
                                        <p class="text-muted">varun@gmail.com</p><a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->