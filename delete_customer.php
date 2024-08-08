<?php
include_once "config/dbconnect.php";
$id=$_GET['id'];
echo $id;
if(isset($id)){
    mysqli_query($conn, "delete from usertbl where userID=$id");
    header("Location: all_customer_screen.php");
}
?>