<?php
if (isset($_POST['signup'])) {
    include_once "config/dbconnect.php";
    $name = $_POST['name'];
    $mobile = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['Password'];
    $isAdmin = 0;

    /// Redirect if USER
    $sql = "INSERT INTO usertbl(name,phone,email,password,isAdmin) VALUES ('$name','$mobile','$email','$password','$isAdmin')";

    mysqli_query($conn, $sql);
    echo "<h2>Registration successfully</h2>";
    header('Location: login.php');

}

?>


<!doctype html>
<html class="no-js" lang="">

<head>
    <?php include "head.php"; ?>
</head>

<body>

<!-- Start Header Top Area -->
<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="logo-area">
                    <a href="#"><img src="img/logo/logo.png" alt=""  style="width: 70px; height: 70px"/></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="header-top-menu">
                    <ul class="nav navbar-nav notika-top-nav">

                        <li><a href="login.php">Already Have Account? Login Here</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header Top Area -->


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-example-wrap mg-t-10 mg-b-15">
            <div class="cmp-tb-hd cmp-int-hd">
                <h2 class="text-center">Enter Your Valid Email and Password Here: </h2>
                <br>
            </div>
            <form enctype='multipart/form-data' action="#" method="POST">

                <div class="row">
                    <div class="col-md-1">
                        <label for="name">Name:</label>
                    </div>
                    <div class="col-md-11">
                        <input type="text" class="form-control" name="name" required>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-1">
                        <label for="email">Email:</label>
                    </div>
                    <div class="col-md-11">
                        <input type="email" class="form-control" name="email" required>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-1">
                        <label for="phone">Phone:</label>
                    </div>
                    <div class="col-md-11">
                        <input type="number" class="form-control" name="phone" required>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-1">
                        <label for="Password">Password:</label>
                    </div>
                    <div class="col-md-11">
                        <input type="password" class="form-control" name="Password" required>
                    </div>
                </div>

                <div class="form-group text-center mg-t-30">
                    <button type="submit" class="btn btn-secondary" name="signup"
                            style="height:40px; background: #122b40"><p style="color: #FFFFFF">Signup</p>
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>


<p><br><br><br><br><br><br><br><br><br></p>

<div class="footer-copyright-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="footer-copy-right">
                    <p>Copyright © 2022
                        . All rights reserved. Develop by <a href="https://github.com/duetianmehedishuvo">Mehedi Hasan
                            Shuvo</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jquery
    ============================================ -->
<script src="js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="js/bootstrap.min.js"></script>
<!-- wow JS
    ============================================ -->
<script src="js/wow.min.js"></script>
<!-- price-slider JS
    ============================================ -->
<script src="js/jquery-price-slider.js"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="js/owl.carousel.min.js"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="js/jquery.scrollUp.min.js"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="js/meanmenu/jquery.meanmenu.js"></script>
<!-- counterup JS
    ============================================ -->
<script src="js/counterup/jquery.counterup.min.js"></script>
<script src="js/counterup/waypoints.min.js"></script>
<script src="js/counterup/counterup-active.js"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- sparkline JS
    ============================================ -->
<script src="js/sparkline/jquery.sparkline.min.js"></script>
<script src="js/sparkline/sparkline-active.js"></script>
<!-- flot JS
    ============================================ -->
<script src="js/flot/jquery.flot.js"></script>
<script src="js/flot/jquery.flot.resize.js"></script>
<script src="js/flot/flot-active.js"></script>
<!-- knob JS
    ============================================ -->
<script src="js/knob/jquery.knob.js"></script>
<script src="js/knob/jquery.appear.js"></script>
<script src="js/knob/knob-active.js"></script>

<!--  todo JS
    ============================================ -->
<script src="js/todo/jquery.todo.js"></script>
<!--  wave JS
    ============================================ -->
<script src="js/wave/waves.min.js"></script>
<script src="js/wave/wave-active.js"></script>
<!-- plugins JS
    ============================================ -->
<script src="js/plugins.js"></script>
<!-- Data Table JS
    ============================================ -->
<script src="js/data-table/jquery.dataTables.min.js"></script>
<script src="js/data-table/data-table-act.js"></script>
<!-- main JS
    ============================================ -->
<script src="js/main.js"></script>

</body>

</html>