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
                                    <h2>All Category</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">

                                <button type="button" class="btn btn-secondary" style="height:40px;margin-bottom: 10px;"
                                        data-toggle="modal" data-target="#addModel">
                                    Add Category
                                </button>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-start">ID</th>
                                <th class="text-start">Category Name</th>
                                <th class="text-start">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include_once "config/dbconnect.php";
                            $sql = "SELECT * from category";
                            $result = $conn->query($sql);
                            $count = 1;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?= $row["category_id"] ?></td>
                                        <td><?= $row["category_name"] ?></td>

                                        <td>
                                            <button type="button" class="btn btn-success editbtn"> Update</button>
                                            ||
                                            <a href="delete_category.php?id=<?php echo $row['category_id']; ?>"
                                               onclick="return confirm('Are you sure?')">
                                                Delete
                                            </a>

                                        </td>

                                    </tr>
                                <?php }
                            } ?>
                            </tbody>

                            <tfoot>
                            <tr>
                                <th class="text-start">ID</th>
                                <th class="text-start">Category Name</th>
                                <th class="text-start">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--=====================================  Add Category Modal ==============================-->
<div class="modal fade" id="addModel" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form form enctype='multipart/form-data' action="#" method="POST">

                    <div class="form-group">
                        <label for="name">Category Name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Category
                        </button>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
            </div>
        </div>

    </div>
</div>
<!--=====================================  Edit Category Modal ==============================-->
<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form form enctype='multipart/form-data' action="update_data.php" method="POST">

                    <input type="hidden" name="category_id" id="category_id">

                    <div class="form-group">
                        <label for="name">Category Name:</label>
                        <input type="text" class="form-control" name="name" id="category_name" required>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary" name="update_category_data" style="height:40px">
                            Update Category
                        </button>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Data Table area End-->
<?php include "fotter.php"; ?>

<script>
    $(document).ready(function () {
        $('.editbtn').on('click', function () {


            $('#editModal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);
            $('#category_id').val(data[0]);
            $('#category_name').val(data[1]);

        });
    });

</script>

</body>

</html>