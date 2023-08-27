<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
require_once './model/connect.php';
if (isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = md5('$password')";
    $res = mysqli_query($conn,$sql);
    
    $rows = mysqli_num_rows($res);
    if ($rows > 0)
    {
        $_SESSION['email'] = $email ;
        while($rows = mysqli_fetch_assoc($res)) {
            $_SESSION['id-user'] = $rows['id'];
        }
        header("location:index.php?rs=success");
        exit();
    }
    else 
    {
        $_SESSION['error'] = 'tên đăng nhập không hợp lệ ' ;
        
        header("location:index.php?error=wrong");
        exit();
    } 
} else {
        echo 'đăng kí tài khoản điii !!!!';
}

