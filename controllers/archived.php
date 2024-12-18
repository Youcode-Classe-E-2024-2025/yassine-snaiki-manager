<?php
session_start();
if(!isset($_SESSION['user_id'])||!isset($_SESSION['role']))
header('Location: /login');
if($_SESSION['role']==='u')
header('Location: /dashboard');

global $db;
$profileName = "Admin";
$users = $db->query("SELECT * FROM users WHERE name != 'admin' and isarchived = true")->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST['hidden'] === 'unarchive' && !empty($_POST['id'])){
        $id = $_POST['id'];
        $db->query('UPDATE users SET isarchived = false where id = ?',[$id]);
        header('Location: /archived');
        exit();
    }
}

require_once 'views/archived.view.php';