<?php
include '../login/send_mail.php';
session_start();


$username = "";
$email = "";
$errors = [];
$conn = new mysqli('localhost', 'root', '', 'test_db');

/// SIGN  UP
if(isset($_POST['signup-btn'])){
    if(empty($_POST['username'])){
        $errors['username']= "Username Required";
    }
    if(empty($_POST['email'])){
        $errors['email']= "Email Required";
    }
    if(empty($_POST['password'])){
        $errors['password']= "Password Required";
    }
    if(!isset($_POST['roles'])){
        $errors['roles']= "Roles Required";
    }
    if(isset($_POST['password'] )&& $_POST['password'] !== $_POST['passwordConf']){
        $errors['passwordConf']= "the two password to match";
    }
    $username = $_POST['username'];
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(50));
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $roles = $_POST['roles'];

        sendEmail_account($token,$roles);
    $sql = "select * from user_2 where email = '$email' LIMIT 1";
    $result = $conn-> query($sql);
    if(mysqli_num_rows($result)>0){
        $errors['email'] = "Email adrealy exist";
    }
    if(count($errors)===0){
        $sql =  "INSERT INTO user_2 SET username=?,email=?,token=?,password=?,roles=?";
        $stmt = $conn -> prepare($sql);
        $stmt->bind_param('sssss', $username, $email, $token, $password,$roles);
        $result = $stmt->execute();

        if($result){
            $user_id = $stmt->insert_id;
            $stmt->close();
            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = false;
            $_SESSION['message'] = 'You are logged in!';
            $_SESSION['type'] = 'alert-success';
            $_SESSION['roles'] = $roles;
            echo "<script>alert('Email sent verify ... ')</script>";
            header('location: ../login/login.php');
        }   else {
            $_SESSION['error_msg'] = "Database error: Could not register user";
        }

    }
}

// LOGIN
if (isset($_POST['login-btn'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username or email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (count($errors) === 0) {
        $query = "SELECT * FROM user_2 WHERE username=? OR email=? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $username, $password);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) { // if password matches
                $stmt->close();

                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['verified'] = $user['verified'];
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = 'alert-success';
                $_SESSION['roles'] = $user['roles'];

                //header('location: ../project_week1/index.php');
                if($user['verified']===0){
                    echo "<script>alert('Email not verified')</script>";
                    header('location: ../login/login.php');

                }else{
                    if($_SESSION['roles']===1){
                        header('location: ../admin/index.php');
                    }else
                        header('location: ../customers/index.php');
                }
                exit(0);
            } else { // if password does not match
                $errors['login_fail'] = "Wrong username / password";
            }
        } else {
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";
        }
    }
}


