<?php
session_start();
if(!isset($_SESSION['user_id'])||!isset($_SESSION['role']))
header('Location: /login');
if($_SESSION['role']==='u')
header('Location: /dashboard');
global $db;
$profileName = 'Admin';
$users = $db->query("SELECT * FROM users WHERE isconfirmed = false")->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST['hidden'] === 'approve' && !empty($_POST['id'])){
        $id = $_POST['id'];
        $db->query('UPDATE users SET isconfirmed = true WHERE id = ?',[$id]);
    }
    if($_POST['hidden'] === 'reject' && !empty($_POST['id'])){
        $id = $_POST['id'];
        $db->query('DELETE FROM users WHERE id = ?',[$id]);
    }
    header('Location: /requests');
    exit();
}

require_once 'views/requests.view.php';