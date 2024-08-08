<?php
include_once "config/dbconnect.php";
$id=$_GET['id'];
echo $id;
if(isset($id)){
    mysqli_query($conn, "delete from book where book_id=$id");
    header("Location: all_book_screen.php");
}
?>