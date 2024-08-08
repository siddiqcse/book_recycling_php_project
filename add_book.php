<?php
include_once "config/dbconnect.php";
if (isset($_POST['upload'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $adminStatus = $_POST['Admin'];
    $isAdmin = 0;
    if ($adminStatus == "YES") {
        $isAdmin = 1;
    }

    $insert = mysqli_query($conn, "INSERT INTO `usertbl`(`name`, `email`, `phone`, `password`, `isAdmin`) VALUES ('$name','$email','$phone','$password','$isAdmin')");

    echo "Customer added successfully.";
    header("Location: all_customer_screen.php");

}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include "head.php"; ?>
</head>

<body>
<?php include "admin_header.php"; ?>

<!-- Form Element area Start-->
<div class="form-element-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-element-list">
                    <div class="basic-tb-hd">
                        <h2>"Please Write All Book Information"</h2>
                    </div>


                    <form enctype='multipart/form-data' action="add_data.php" method="POST">

                        <div class="row">
                            <div class="col-md-1">
                                <label>Category:</label>
                            </div>
                            <div class="col-md-11">
                                <select name="category" class="form-control">
                                    <option disabled selected>Select category</option>
                                    <?php

                                    $sql = "SELECT * from category";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='" . $row['category_name'] . "'>" . $row['category_name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-1">
                                <label for="name">Title:</label>
                            </div>
                            <div class="col-md-11">
                                <input type="text" class="form-control" name="title" required>
                            </div>
                        </div>
                        <p></p>

                        <div class="row">
                            <div class="col-md-1">
                                <label for="Price">Price:</label>
                            </div>
                            <div class="col-md-11">
                                <input type="number" class="form-control" name="Price" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-1">
                                <label for="Quantity">Quantity:</label>
                            </div>
                            <div class="col-md-11">
                                <input type="number" class="form-control" name="Quantity" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-1">
                                <label for="Edition">Edition:</label>
                            </div>
                            <div class="col-md-11">
                                <input type="number" class="form-control" name="Edition" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="y_build">Year Of Build:</label>
                            <input type="number" class="form-control" name="y_build" required>
                        </div>
                        <div class="form-group">
                            <label for="writer_name">Writer Name:</label>
                            <input type="text" class="form-control" name="writer_name" required>
                        </div>

                        <div class="row">
                            <div class="col-md-1">
                                <input type="checkbox" class="custom-control-input" name="isFree" checked>
                            </div>
                            <div class="col-md-11">
                                <label for="isFree"> Book is Free?</label>
                            </div>
                        </div>

                        <br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2">
                                    <label for="file">Choose Book Image:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" class="form-control-file" name="choosefile">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea  rows="2" cols="20"   class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" name="add_book_data"
                                    style="height:40px; background: #122b40"><p style="color: #FFFFFF">Add Book</p>
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>
</div>


<?php
include "fotter.php";
?>
</body>

</html>