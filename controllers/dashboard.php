<?php
session_start();

if(!isset($_SESSION['user_id'])||!isset($_SESSION['role']))
header('Location: /login');
if($_SESSION['role']==='a')
header('Location: /admin-dashboard');

$profileName = $_SESSION['name'];

require "views/dashboard.view.php";