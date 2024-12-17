<?php
session_start();
if(!isset($_SESSION['user_id'])||!isset($_SESSION['role']))
header('Location: /login');
if($_SESSION['role']==='u')
header('Location: /dashboard');
require_once "views/admin-dashboard.view.php";