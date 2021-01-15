<?php 
    $conn=mysqli_connect('localhost','root','','qluser');
    function emailValid($string) 
    { 
      return preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $string);
    }
