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
                                    <h2>All Customer Lists</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">

                                <button class="btn btn-success  notika-btn-primary"><a href="add_customer.php"><p style="color: white">Add
                                            Customer</p></a></button>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">FUll Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Contact Number</th>
                                <th class="text-center">Is Admin</th>
                                <th class="text-center" colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include_once "config/dbconnect.php";
                            $sql = "SELECT * from usertbl";
                            $result = $conn->query($sql);
                            $count = 1;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?= $row["userID"] ?></td>
                                        <td><?= $row["name"] ?></td>
                                        <td><?= $row["email"] ?></td>
                                        <td><?= $row["phone"] ?></td>
                                        <td><?php
                                            if ($row["isAdmin"] == 0) {
                                                echo 'No';
                                            } else {
                                                echo 'YES';
                                            }
                                            ?></td>
                                        <td>
                                            <a href="edit_customer.php?id=<?php echo $row['userID']; ?>"
                                            ><p style="color: green"> Update </p></a>


                                        </td>
                                        <td>
                                            <a href="delete_customer.php?id=<?php echo $row['userID']; ?>"
                                               onclick="return confirm('Are you sure?')"><p style="color: red">
                                                    Delete
                                                </p></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $count = $count + 1;
                                }
                            }
                            ?>
                            </tbody>

                            <tfoot>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">FUll Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Contact Number</th>
                                <th class="text-center">Is Admin</th>
                                <th class="text-center" colspan="2">Action</th>
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