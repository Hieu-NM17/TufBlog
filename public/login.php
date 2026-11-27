<?php
session_start();
$errors = [];
$success = $_SESSION['success'] ?? '';
unset($_SESSION['success']);
include __DIR__  . '/../app/config/database.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT id, username, password, role FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        session_regenerate_id(true);
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        if ($_SESSION['role'] === 'admin') {
            header('Location: admin/index.php');
        } else {
            header('Location: index.php');
        }
        exit();
    } else {
        $errors['wrong_info'] = 'Thông tin đăng nhập không đúng !';
    }
}
require_once __DIR__ . '/../app/views/auth/login.php';
