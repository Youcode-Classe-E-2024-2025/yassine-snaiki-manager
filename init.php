<?php

global $db;


$rowsCount = $db->query('SELECT COUNT(*) FROM users')->fetch()['count'];
if($rowsCount === 0) {
    $hashedPassword = password_hash('admin', PASSWORD_DEFAULT);
    try {
        $id = $db->query("INSERT INTO users(name,email,password,isconfirmed) VALUES (?,?,?) RETURNING id;",['admin','admin@gmail.com',$hashedPassword,true])->fetch()['id'];
        $db->query("INSERT INTO roles(name,user_id) VALUES(?,?)",['a',$id]);
    }catch(PDOException $err) {
        echo "$err failed to execute query";
    }

}
$hashedPassword = password_hash('admin', PASSWORD_DEFAULT);
