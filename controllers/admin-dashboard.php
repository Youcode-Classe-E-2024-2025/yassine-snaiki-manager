<?php
session_start();
if(!isset($_SESSION['user_id'])||!isset($_SESSION['role']))
header('Location: /login');
if($_SESSION['role']==='u')
header('Location: /dashboard');

global $db;
$profileName = "Admin";
$users = $db->query("SELECT * FROM users WHERE name != 'admin' and isconfirmed = true and isarchived = false;")->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD']==='POST'){
    if($_POST['hidden']==="archive" && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $db->query('UPDATE users SET isarchived = true WHERE id = ?',[$id]);
        header('Location: /admin-dashboard');
        exit();
    }
}
require_once "views/admin-dashboard.view.php";