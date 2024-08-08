<?php
include_once "config/dbconnect.php";
session_start();
if (isset($_POST['add_book_data'])) {
    $category_id = $_POST['category_id'];
    $title = $_POST['title'];
    $price = $_POST['Price'];
    $quantity = $_POST['Quantity'];
    $edition = $_POST['Edition'];
    $y_build = $_POST['y_build'];
    $writer_name = $_POST['writer_name'];
    $description = $_POST['description'];
    $isFreeStatus = isset($_POST['isFree']) ? 1 : 0;

    $category = $_POST['category'];
    $is_sold = 0;
    $user_id = $_SESSION['userID'];


    // for image upload
    $filename = $_FILES["choosefile"]["name"];

    $tempname = $_FILES["choosefile"]["tmp_name"];

    $folder = "images/" . $filename;
    move_uploaded_file($tempname, $folder);

    $query = "INSERT INTO `book`( `user_id`, `title`, `image_url`, `isSold`, `price`, `isFree`, `description`, `writer`, `quantity`, `category`, `edition`, `year_of_build`) VALUES ('$user_id','$title','$filename','$is_sold','$price','$isFreeStatus','$description','$writer_name','$quantity','$category','$edition','$y_build')";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo '<script> alert("Book Inserted Successfully"); </script>';
        header("Location: all_book_screen.php");
    } else {
        echo '<script> alert("Book Not Inserted"); </script>';
    }
}
?>