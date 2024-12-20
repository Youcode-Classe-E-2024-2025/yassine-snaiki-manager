<?php
session_start();

if(!isset($_SESSION['user_id'])||!isset($_SESSION['role']))
header('Location: /login');
if($_SESSION['role']==='a')
header('Location: /admin-dashboard');

$profileName = $_SESSION['name'];
global $db;

$history = $db->query("SELECT h.amount amount,h.type type, TO_CHAR(h.created_at, 'YYYY-MM-DD HH24:MI:SS') created_at , u.name as name FROM history h join users u on  h.receiver_id = u.id where user_id = ?;", [$_SESSION['user_id']])->fetchAll(PDO::FETCH_ASSOC);
// var_dump($history);

require_once 'views/history.view.php';