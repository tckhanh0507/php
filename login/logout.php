<?php
session_destroy();
include 'home.php';
include '../controllers/authController.php';
//include '../customers/index.php';
//include '../customers/cart.php';

unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['verify']);
unset($_SESSION['roles']);
unset($_SESSION['cart']);
header("location: login.php");
