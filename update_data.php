<?php
include_once "config/dbconnect.php";

if (isset($_POST['update_category_data'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];

    $query = "UPDATE `category` SET `category_name`='$name' WHERE category_id=$category_id";
//    $query = "UPDATE category SET category_name=$name where category_id=$category_id";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo '<script> alert("Data Updated"); </script>';
        header("Location: all_category.php");
    } else {
        echo '<script> alert("Data Not Updated"); </script>';
    }


}
?>