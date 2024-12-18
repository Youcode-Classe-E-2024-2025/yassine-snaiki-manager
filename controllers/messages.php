<?php
session_start();
if(!isset($_SESSION['user_id'])||!isset($_SESSION['role']))
header('Location: /login');
if($_SESSION['role']==='a')
header('Location: /admin-dashboard');
global $db;

$profileName = $_SESSION['name'];

$messages = $db->query("SELECT id, TO_CHAR(created_at, 'YYYY-MM-DD HH24:MI:SS') AS created_at, text FROM messages where user_id = ?;",[$_SESSION['user_id']])->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD']==='POST'){
    if($_POST['hidden']==="delete-message" && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $db->query('DELETE FROM messages where id = ?',[$id]);
        header('Location: /messages');
        exit();
    }
}

require "views/messages.view.php";