<?php
include_once "config/dbconnect.php";
if (isset($_POST['upload'])) {

    $name = $_POST['name'];

    $insert = mysqli_query($conn, "INSERT INTO `category`( `category_name`) VALUES ('$name')");

    echo "Category added successfully.";
    header("Location: all_category.php");

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
                        <h2>Add Customer</h2>
                    </div>


                    <form enctype='multipart/form-data' action="#" method="POST">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>


                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="phone" class="form-control" name="phone" required>
                        </div>


                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label>Admin Status:</label>
                            <select name="Admin">
                                <option disabled selected>Select Status</option>
                                <option value='YES'>yes</option>
                                <option value='NO'>No</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" name="upload"
                                    style="height:40px; background: #122b40"><p style="color: #FFFFFF">Add Customer</p>
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