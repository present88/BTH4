<?php
session_start();
if(!isset($_SESSION['user_level']))
  require('indexform.php');
else if($_SESSION['user_level']==0)
{
  require('user.php');
}
else if($_SESSION['user_level']==1)
{
  require('admin.php');
}