<?php


if(isset($_SESSION['user_id']))
header('location : /dashboard');

global $db;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $username = trim(htmlspecialchars($email));
    $password = trim(htmlspecialchars($password));


    $user = $db->query("SELECT u.id as id,u.name as name,u.password as password,u.email as email,r.name as role FROM users u JOIN roles r ON u.id = r.user_id  WHERE email = ?", [$email])->fetch();
    if ($user) {
        if (password_verify($password,$user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            echo $user['name'], $user['role'];
            if($user['role'] === 'u'){         
                header("Location: /dashboard");
            }
            else {
                header("Location: /admin-dashboard");
            }
            exit();
        } 
        else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}

require "views/login.view.php";