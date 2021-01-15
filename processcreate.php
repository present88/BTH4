<?php
session_start();
if($_SESSION['user_level']==1)
{   
    $mail=$_POST['mail'];
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $class=$_POST['class'];
    $addr1=$_POST['addr1'];
    $addr2=$_POST['addr2'];
    $city=$_POST['city'];
    $coun=$_POST['coun'];
    $zcode=$_POST['zcode'];
    $phone=$_POST['phone'];
    include('db/connect.php');
    $sql="insert into user (email,username,password,first_name,last_name,class,address1,address2,city,state_country,zip_code,phone,Status) values ('$mail','$user','$pass','$fname','$lname','$class','$addr1','$addr2','$city','$coun','$zcode','$phone',1)";
    $res=mysqli_query($conn,$sql);
    echo $sql;
    if($res)
    {
        header("location:index.php");
    }
    else
    {
        echo"an error,please try again !";
    }
}
else
{
    header("location:index.php");
}
