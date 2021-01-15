<?php
session_start();
include('db/connect.php');
if (isset($_SESSION['user_level'])) {
  if ($_SESSION['user_level'] == 1 && isset($_GET['user'])) {
    $sql = "update user set Status=1 where username='" . $_GET['user'] . "'";
    mysqli_query($conn, $sql);
    header('location:index.php');
  } else {
    header('location:index.php');
  }
}
if (isset($_GET['userid']) && isset($_GET['activecode'])) {
  $userid = $_GET['userid'];
  $activecode = $_GET['activecode'];
  $sql = "select * from user where userid='$userid' and activation_code='$activecode'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $sql = "update user set Status=1 where userid='$userid'";
    mysqli_query($conn, $sql);
    include("indexform.php");
    echo "<script type=\"text/javascript\">
                  $(document).ready(function(){
                    $('#login').modal('show');
                  });
                  alert('Successfully Verified');
                </script>";
  } else {
    echo "error code";
  }
} else {
  header("location:index.php");
}
