<?php
include('db/connect.php');
if($_POST['email']=="")
{
    $errorsu['email']="yes";
}
if(!emailValid($_POST['email']))
{
    $errorsu['email']="yes";
}
if($_POST['username']=="")
{
    $errorsu['username']="yes";
}
if($_POST['pass']=="")
{
    $errorsu['pass']="yes";
}
if(count($errorsu)==0)
{
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['pass'];
    $activecode=random_int(9999,99999);
    $sql="INSERT INTO user(email,password,username,activation_code,avatar) VALUES ('$email','$password','$username','$activecode','avt/default.png')";
    $res= mysqli_query($conn,$sql);
    $sql="select userid from user where username='$username'";
    $res=mysqli_query($conn,$sql);
    $userid=mysqli_fetch_row($res);
    $userid=$userid[0];
    mail($email,"Active Account","Visit:http://localhost/TH4/active.php?userid=$userid&activecode=$activecode/ to active your account");
    if($res)
    {
        $errorsu['user']="We have sent 1 email to confirm";     
    }
    else
    {
        $errorsu['user']="Username already exists";
    }
}
