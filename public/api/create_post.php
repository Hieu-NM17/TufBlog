<?php
session_start();
require_once __DIR__ . '/../../app/config/database.php';

header('Content-Type: application/json');

// Phải đăng nhập mới được đăng bài
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Bạn cần đăng nhập để đăng bài']);
    exit;
}

// Lấy nội dung và kiểm tra
$content = trim($_POST['content'] ?? '');

if ($content === '' || mb_strlen($content) > 500) {
    echo json_encode(['error' => 'Nội dung phải từ 1 đến 500 ký tự']);
    exit;
}

// Lưu vào database
$userId = $_SESSION['user_id'];

$stmt = $conn->prepare('INSERT INTO posts (user_id, content) VALUES (?, ?)');
$stmt->bind_param('is', $userId, $content);
$stmt->execute();

echo json_encode(['success' => true]);