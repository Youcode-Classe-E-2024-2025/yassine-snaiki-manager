<?php
session_start();

if(!isset($_SESSION['user_id'])||!isset($_SESSION['role']))
header('Location: /login');
if($_SESSION['role']==='a')
header('Location: /admin-dashboard');

$profileName = $_SESSION['name'];
global $db;

// $user_info = $db->query("SELECT balance , totaldeposits, totalwithdrawals FROM userinfo where user_id = ?",[$_SESSION['user_id']])->fetch();

$movements = $db->query("SELECT amount, TO_CHAR(created_at, 'YYYY-MM-DD HH24:MI:SS') created_at , type FROM movements where user_id = ?;", [$_SESSION['user_id']])->fetchAll(PDO::FETCH_ASSOC);
$balance=0;
$totaldep = 0;
$totalwith = 0;
foreach($movements as $movement) {
    if($movement['type'] === 'd') $totaldep += $movement['amount'];
    else $totalwith += $movement['amount'];
}
$balance = $totaldep - $totalwith;


require "views/dashboard.view.php";