<?php
include_once "config/dbconnect.php";


?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <?php include "head.php"; ?>
</head>

<body>


<?php
include "admin_header.php";
?>

<!-- Start Status area -->
<div class="notika-status-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">
                                <?php

                                $sql = "SELECT * from book";
                                $result = mysqli_query($conn, $sql);
                                $count = 0;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                        $count = $count + 1;
                                    }
                                }
                                echo $count;
                                ?>

                            </span></h2>
                        <p>Total Book</p>
                    </div>
                    <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">
                                <?php

                                $sql = "SELECT * from usertbl";
                                $result = mysqli_query($conn, $sql);
                                $count = 0;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                        $count = $count + 1;
                                    }
                                }
                                echo $count;
                                ?>

                            </span>p</h2>
                        <p>Total Customer</p>
                    </div>
                    <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">
                                <?php

                                $sql = "SELECT * from category";
                                $result = mysqli_query($conn, $sql);
                                $count = 0;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                        $count = $count + 1;
                                    }
                                }
                                echo $count;
                                ?>

                            </span></h2>
                        <p>Total Category</p>
                    </div>
                    <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                </div>
            </div>

        </div>
    </div>
</div>
<p><br><br><br><br><br><br><br><br><br><br><br><br><br></p>
<?php
include "fotter.php";
?>
</body>

</html>