<!doctype html>
<html>

<head>
    <?php include "head.php"; ?>
</head>

<body>
<?php include "admin_header.php"; ?>

<!-- Data Table area Start-->
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">

                                <div class="breadcomb-ctn">
                                    <h2>All Book Lists</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <button class="btn btn-success  notika-btn-primary"
                                        onclick="window.location.href='add_book.php';">Add
                                    Book
                                </button>

                            </div>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: 15%">Image</th>
                                <th class="text-center">User-ID</th>
                                <th style="width: 40%">Title</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Is Sold</th>
                                <th class="text-center">Is Free</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include_once "config/dbconnect.php";
                            $sql = "SELECT * from book";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><img height='100px' src='images/<?= $row["image_url"] ?>'></td>
                                        <td><?= $row["user_id"] ?></td>
                                        <td><?= $row["title"] ?></td>
                                        <td><?= $row["price"] ?></td>
                                        <td><?php
                                            if ($row["isSold"] == 0) {
                                                echo 'No';
                                            } else {
                                                echo 'YES';
                                            }
                                            ?></td>
                                        <td><?php
                                            if ($row["isFree"] == 0) {
                                                echo 'No';
                                            } else {
                                                echo 'YES';
                                            }
                                            ?></td>
                                        <td>
                                            <a href="edit_customer.php?id=<?php echo $row['book_id']; ?>"
                                            ><p style="color: green"> Update </p></a>


                                        </td>
                                        <td>
                                            <a href="delete_book.php?id=<?php echo $row['book_id']; ?>"
                                               onclick="return confirm('Are you sure?')"><p style="color: red">
                                                    Delete
                                                </p></a>
                                        </td>
                                    </tr>
                                    <?php

                                }
                            }
                            ?>
                            </tbody>

                            <tfoot>
                            <tr>
                                <th class="text-center">Image</th>
                                <th class="text-center">User-ID</th>
                                <th class="text-center" colspan="2">Title</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Is Sold</th>
                                <th class="text-center">Is Free</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data Table area End-->
<?php include "fotter.php"; ?>

</body>

</html>