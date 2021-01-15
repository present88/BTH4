<?php
include('db/connect.php');
if($_POST['mailuser']=="")
{
    $errorlg['mailuser']="yes";
}
if($_POST['password']=="")
{
    $errorlg['password']="yes";
}
if(count($errorlg)==0)
{
    $usermail=$_POST['mailuser'];
    $password=$_POST['password'];
    $sql="select * from user where (username='$usermail' or email='$usermail') and password='$password'";
    $result=mysqli_query($conn,$sql);
    $user=mysqli_fetch_row($result);
    if($user)
    {
        if($user[6]==0)
        {
            $errorlg['user']="Not Active"; 
        }
        else
        {
            $_SESSION['username']=$user[1];
            if($user[7]==1)          
                $_SESSION['user_level']=1;
            else
                $_SESSION['user_level']=0;
            header("location:index.php");
        }
    }       
    else
    {
        $errorlg['user']="Username or Password Error";      
    }
}
