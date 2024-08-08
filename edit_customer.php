<?php
include_once "config/dbconnect.php";
$id = $_GET['id'];
if(isset($id)){
    $result = mysqli_query($conn, "select * from usertbl where userID=$id");
    $res = mysqli_fetch_assoc($result);
}


if(isset($_POST['edit']))
{

    $name = $_POST['name'];
    $email= $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $adminStatus = $_POST['Admin'];
    $isAdmin=0;
    if($adminStatus=="YES"){
        $isAdmin=1;
    }

    $insert = mysqli_query($conn,"UPDATE `usertbl` SET `name`='$name',`email`='$email',`phone`='$phone',`isAdmin`='$isAdmin' WHERE userID=$id");

    echo "Customer Update successfully.";
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
                        <h2>Update Customer</h2>
                    </div>


                    <form enctype='multipart/form-data' action="#" method="POST">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name"  value="<?php echo $res['name']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email"  value="<?php echo $res['email']; ?>" required>
                        </div>


                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="phone" class="form-control" name="phone"  value="<?php echo $res['phone']; ?>"  required>
                        </div>


                        <div class="form-group">
                            <label>Admin Status:</label>
                            <select name="Admin">
                                <?php
                                if($res["isAdmin"]==0){
                                    echo"<option selected value='NO'>No</option>";
                                    echo"<option value='YES'>yes</option>";
                                }else{
                                    echo"<option selected value='YES'>yes</option>";
                                    echo"<option value='NO'>No</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" name="edit"
                                    style="height:40px; background: #122b40"><p style="color: #FFFFFF">Update Customer</p>
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>
</div>


<?php include "fotter.php"; ?>
</body>

</html>