<?php
session_start();
include('db/connect.php');
if ($_SESSION['user_level'] == 1 && isset($_GET['user'])) {
  $sql = "update user set user_level=1 where username='" . $_GET['user'] . "'";
  mysqli_query($conn, $sql);
  header('location:index.php');
}
else
{
    header('location:index.php');
}