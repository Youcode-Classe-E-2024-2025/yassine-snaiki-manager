<?php

session_start();


generateCsrfToken();

if(isset($_SESSION['user_id'])){
    header('Location: /dashboard');
    exit();
}


if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

global $db;



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        http_response_code(403); 
        die("Invalid CSRF token.");
    }

    $email = $_POST['email'];
    $password = $_POST['password'];


    $username = trim(htmlspecialchars($email));
    $password = trim(htmlspecialchars($password));


    $user = $db->query("SELECT u.id as id,u.name as name,u.password as password,u.email as email,u.isarchived as isarchived,u.isconfirmed as isconfirmed,r.name as role FROM users u JOIN roles r ON u.id = r.user_id  WHERE email = ?", [$email])->fetch();
    if ($user) {
        if (password_verify($password,$user['password']) && $user['isconfirmed'] && !$user['isarchived']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['message'] = ""; 
            echo "<script>location.replace('/dashboard');</script>";  
            generateCsrfToken();
            
        }else if(!$user['isconfirmed'] && !$user['isarchived']) {
            $_SESSION['message'] = "your request has been registered wait for approval";
            header('Location: /login');
        }
        else if($user['isarchived']) {
            $_SESSION['message'] = "this account has been deleted";
            header('Location: /login');
        } 
        else {
            $_SESSION['message'] = "Invalid password!";
            header('Location: /login');
        }
        
    } else {
        $_SESSION['message'] = "User not found!";
        header('Location: /login');
    }
    exit();
}

require "views/login.view.php";