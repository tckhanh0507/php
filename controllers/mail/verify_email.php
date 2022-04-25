<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'test_db');

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $roles = $_GET['role'];
    $sql = "SELECT * FROM user_2 WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $query = "UPDATE user_2 SET verified=1,roles ='$roles' WHERE token='$token '";

        if (mysqli_query($conn, $query)) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = true;
            $_SESSION['message'] = "Your email address has been verified successfully";
            $_SESSION['type'] = 'alert-success';
            if($roles==='1'){
                header('location: ../../admin/views/index.php');
            }else
                header('location: ../../views/product.php');
            exit(0);
        }
    } else {
        echo "User not found!";
    }
} else {
    echo "No token provided!";
}

