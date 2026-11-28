<?php
$errors = [];
session_start();
require_once __DIR__  . '/../app/config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $display_name = trim($_POST['display_name'] ?? '');
    $retype_password = $_POST['retype_password'] ?? '';
    $email = trim($_POST['email'] ?? '');

    if (empty($display_name)) {
        $errors['display_name'] = 'Tên hiển thị không được bỏ trống';
    }

    if (mb_strlen($display_name, 'UTF-8') > 20) {
        $errors['display_name'] = 'Tên hiển thị không được quá 20 ký tự';
    }

    if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        $errors['username'] = 'Tên đăng nhập chỉ gồm chữ, số, dấu gạch dưới (3-20 ký tự)';
    }

    if (strlen($password) < 6) {
        $errors['password'] = 'Mật khẩu cần ít nhất 6 ký tự';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Định dạng email không hợp lệ';
    }

    if ($password !== $retype_password) {
        $errors['retype_password'] = 'Mật khẩu không khớp';
    }

    if (empty($errors)) {
        $sql = "SELECT id FROM users WHERE username = '$username' OR email = '$email'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $errors['user_exist'] = 'Username hoặc Email đã được đăng ký trên hệ thống';
        }
    }

    if (empty($errors)) {
        $sql = "INSERT INTO `users`(`username`, `password`, `display_name`, `email`) 
            VALUES ('$username', '$password', '$display_name', '$email')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['success'] = 'Đăng ký thành công, vui lòng đăng nhập!';
            header('Location: login.php');
            exit;
        }
    }
}


require_once __DIR__ . '/../app/views/auth/register.php';
