<?php
session_start();
if(!isset($_SESSION['user_id'])||!isset($_SESSION['role']))
header('Location: /login');
if($_SESSION['role']==='a')
header('Location: /admin-dashboard');

if(isset($_SESSION['error'])){
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}

global $db;

$profileName = $_SESSION['name'];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST['hidden'] === 'closeaccount' && !empty($_POST['password'])) {
        $password = htmlspecialchars($_POST['password']);
        $hashedPassword =$db->query("SELECT password FROM users WHERE id = ?",[$_SESSION['user_id']])->fetch()['password'];
        if(password_verify($password,$hashedPassword)){
            $db->query("UPDATE users SET isarchived = true WHERE id = ?",[$_SESSION['user_id']])->fetch();
            unset($_SESSION['user_id']);
            unset($_SESSION['role']);
            header('Location: /login');
            exit();
        }else {
            $_SESSION['error'] = "incorrect password";
        }
        header('Location: /settings');
            exit();
    }
    if($_POST['hidden'] === 'changepassword' && !empty($_POST['password']) && !empty($_POST['new-password'])) {
        $password = htmlspecialchars($_POST['password']);
        $newPassword = htmlspecialchars($_POST['new-password']);
        $hashedPassword =$db->query("SELECT password FROM users WHERE id = ?",[$_SESSION['user_id']])->fetch()['password'];
        if(password_verify($password,$hashedPassword)){
            $db->query("UPDATE users SET password = ? WHERE id = ?",[password_hash($newPassword,PASSWORD_DEFAULT),$_SESSION['user_id']])->fetch();
            header('Location: /settings');
            exit();
        }else {
            $_SESSION['error'] = "incorrect password";
        }
        header('Location: /settings');
            exit();
    }
}

require_once "views/settings.view.php";