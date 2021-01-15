<?php
session_start();
if(isset($_SESSION['username']))
{
    if($_SESSION['user_level']==1 && isset($_GET['user']))
    {
        $username=$_GET['user'];
        $url="update.php?user=$username";
    }
    else
    {
        $username=$_SESSION['username'];
        $url="update.php";
    }
    $extension = explode(".", $_FILES["avt"]["name"]);
    $extension = end($extension);
    $avatar="avt/". $username.".".$extension;
    if ((($_FILES["avt"]["type"] == "image/gif")
        || ($_FILES["avt"]["type"] == "image/jpeg")
        || ($_FILES["avt"]["type"] == "image/png")
        || ($_FILES["avt"]["type"] == "image/pjpeg"))) {
        move_uploaded_file($_FILES["avt"]["tmp_name"],$avatar);
    }
    include('db/connect.php');
    $sql="update user set avatar='$avatar' where username='$username'";
    mysqli_query($conn,$sql);
    header("location:$url");
}
else
{
    echo $_SESSION['username'];
}
