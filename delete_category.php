<?php
include_once "config/dbconnect.php";
$id=$_GET['id'];
echo $id;
if(isset($id)){
    mysqli_query($conn, "delete from category where category_id=$id");
    header("Location: all_category.php");
}
?>