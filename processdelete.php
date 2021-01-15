<?php
session_start();
if ($_SESSION['user_level'] == 1) {
    $name = $_GET['user'];
    include('db/connect.php');
    $sql = "delete from user where username='$name'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        header("location:index.php");
    } else {
        echo "an error,please try again !";
    }
} else {
    header("location:index.php");
}
