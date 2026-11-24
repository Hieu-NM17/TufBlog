<?php
session_start();

// Chưa đăng nhập thì chuyển sang trang đăng nhập
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$pageTitle = 'Trang chủ';
require_once __DIR__ . '/../app/views/home/index.php';