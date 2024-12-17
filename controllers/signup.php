<?php


echo "hi";
global $db;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = trim(htmlspecialchars($_POST['username']));
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));

    if(!empty($username)&&!empty($email)&&!empty($password)){
        $id = $db->query('INSERT INTO users(name,email,password) values(?,?,?) returning id',[$username,$email,password_hash($password,PASSWORD_DEFAULT)])->fetch()['id'];
        $db->query('INSERT INTO roles(name,user_id) values(?,?)',['u',$id]);
        header('Location: /login');
    }
}

require_once "views/signup.view.php";