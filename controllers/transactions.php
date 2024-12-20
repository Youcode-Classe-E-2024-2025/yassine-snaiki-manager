<?php

session_start();
if(!isset($_SESSION['user_id'])||!isset($_SESSION['role']))
header('Location: /login');
if($_SESSION['role']==='a')
header('Location: /admin-dashboard');
$profileName = $_SESSION['name'];

if(isset($_SESSION['transfererror'])){
    $transferError = $_SESSION['transfererror'];
    unset($_SESSION['transfererror']);
}
if(isset($_SESSION['transactionerror'])){
    $transactionError = $_SESSION['transactionerror'];
    unset($_SESSION['transactionerror']);
}
if(isset($_SESSION['success'])){
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}

global $db;


//--------------------------------
$movements = $db->query("SELECT amount, TO_CHAR(created_at, 'YYYY-MM-DD HH24:MI:SS') created_at , type FROM movements where user_id = ?;", [$_SESSION['user_id']])->fetchAll(PDO::FETCH_ASSOC);
$balance=0;
$totaldep = 0;
$totalwith = 0;
foreach($movements as $movement) {
    if($movement['type'] === 'd') $totaldep += $movement['amount'];
    else $totalwith += $movement['amount'];
}
$balance = $totaldep - $totalwith;
//--------------------------------

$users = $db->query("SELECT * FROM users WHERE name != 'admin'")->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST['hidden'] === 'transaction' && !empty($_POST['amount']) && !empty($_POST['type'])) {
        $amount = (float) trim(htmlspecialchars($_POST['amount']));
        $type = trim(htmlspecialchars($_POST['type']));
        if($amount>0 && $amount < 10000){
        $db->query('INSERT INTO movements(amount,type,user_id) values(?,?,?)',[$amount,$type,$_SESSION['user_id']]);
        $_SESSION['success'] = 'transaction was made successfuly';
        }else if($amount>=10000){
            $_SESSION['transactionerror'] = "exceeded transaction limit";
        }else {
            $_SESSION['transactionerror'] = "please enter a correct amount";
        }
        header('Location: /maketransaction');
        exit();
    }
    if($_POST['hidden'] === 'transfer' && !empty($_POST['amount']) && !empty($_POST['id'])) {
        $amount = (float) trim(htmlspecialchars($_POST['amount']));
        $receiver = trim(htmlspecialchars($_POST['id']));
        if($balance>=$amount && $amount>0){
            
            $db->query("INSERT INTO movements(amount,type,user_id) values(?,'w',?)",[$amount,$_SESSION['user_id']]);
            $db->query("INSERT INTO movements(amount,type,user_id) values(?,'d',?)",[$amount,$receiver]);
            $db->query("INSERT INTO history(amount,type,user_id,receiver_id) values(?,?,?,?)",[$amount,'t',$_SESSION['user_id'],$receiver]);
            $db->query("INSERT INTO history(amount,type,user_id,receiver_id) values(?,?,?,?)",[$amount,'r',$receiver,$_SESSION['user_id']]);
            $_SESSION['success'] = 'Money was transfered successfuly';
        }else if($balance<$amount && $amount>0){
            $_SESSION['transfererror'] = "not enough balance";
        }else if($amount<=0 || $amount === ''){
            $_SESSION['transfererror'] = "please enter a correct amount";
        }
        header('Location: /maketransaction');
        exit();
    }
}

require_once 'views/transactions.view.php';