
<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
require_once './model/connect.php';
if (isset($_POST['submit']))
{

    

    if (isset($_POST['full_name'])) {
        $full_name = $_POST['full_name'];
    }

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }

    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }

    

    $sql = "INSERT INTO users (full_name, email, password)
            VALUES ('$full_name', '$email', md5('$password') )";
    $res = mysqli_query($conn,$sql);
    if ($res)
    {
        header("location:login.php?rs=success");
        exit();
    }
    else 
    {
        header("location:login.php?rs=fail");
        exit();
        
    }
}
