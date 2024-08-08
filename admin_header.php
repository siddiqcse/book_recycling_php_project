<?php
session_start();
include_once "config/dbconnect.php";

?>

<!-- Start Header Top Area -->
<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="logo-area">
                    <a href="#"><img src="img/logo/logo.png" alt=""
                                     style="width: 50px; height: 50px; color: white"/></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="header-top-menu">
                    <ul class="nav navbar-nav notika-top-nav">
                        <li class="nav-item nc-al"><a href="#" data-toggle="dropdown" role="button"
                                                      aria-expanded="false" class="nav-link dropdown-toggle"><span><i
                                            class="notika-icon notika-alarm"></i></span>
                            </a>
                        </li>
                        <li><a href="logout.php">Logout</a></li>
                        <li><a href=""><?php echo $_SESSION['name'] ?> </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header Top Area -->

<!-- Main Menu area start-->
<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li><a href="admin_home.php"><i class="notika-icon notika-house"></i> Home</a></li>

                    <li><a href="all_book_screen.php"><i class="notika-icon notika-form"></i> Books</a>
                    </li>
                    <li><a href="all_customer_screen.php"><i class="notika-icon notika-form"></i> Customer</a>
                    </li>
                    <li><a href="all_category.php"><i class="notika-icon notika-app"></i> Category</a></li>

                </ul>

            </div>
        </div>
    </div>
</div>
<!-- Main Menu area End-->
